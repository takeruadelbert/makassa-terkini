<?php

/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class FrontsController extends AppController {

    /**
     * This controller does not use a model
     *
     * @var array
     */
    public $uses = array();

    /**
     * Displays a view
     *
     * @return void
     * @throws NotFoundException When the view file could not be found
     * 	or MissingViewException in debug mode.
     */
    public function front_display() {
        $path = func_get_args();
        $this->_render($path);
    }

    public function member_display() {
        $path = func_get_args();
        $this->_render($path);
    }

    public function mobile_display() {
        $path = func_get_args();
        $this->_renderMobile($path);
    }

    public function _renderMobile($path) {
        $count = count($path);
        if (!$count) {
            $path[] = 'ID';
            $path[] = "index";
        }
        $page = $subpage = $title_for_layout = null;

        if (!empty($path[1])) {
            $page = $path[$count - 1];
        }
        if (!empty($path[2])) {
            $subpage = $path[2];
        }
        if (!empty($path[$count - 1])) {
            $title_for_layout = Inflector::humanize($path[$count - 1]);
        }
        $this->set(compact('mobile', 'subpage', 'title_for_layout', 'page'));
        switch ($page) {
            case "detail_news":
                $news_id = $path[0];
                $dataNews = ClassRegistry::init("News")->find("first",["conditions" => ["News.id" => $news_id]]);
                if($dataNews['News']['news_status_id'] == 3) {
                    $currentNews = ClassRegistry::init("News")->find("first", [
                        "conditions" => [
                            "News.id" => $news_id
                        ],
                        "recursive" => 2,
                    ]);
                    $hitData = [];
                    $hitData['News']['hits'] = $currentNews['News']['hits'] + 1;
                    $hitData['News']['id'] = $news_id;
                    ClassRegistry::init("News")->saveAll($hitData);
                    $similar_news = [];
                    $metakey_current_news = $currentNews['News']['meta_key'];
                    $all_news = ClassRegistry::init("News")->find("all");
                    foreach ($all_news as $k => $news) {
                        if ($news['News']['id'] != $news_id) {
                            $count_similar = $this->count_similar($metakey_current_news, $news['News']['meta_key']);
                            if ($count_similar > 0) {
                                $similar_news[] = array($news, $count_similar);
                            }
                        }
                    }

                    function compareOrder($a, $b) {
                        return $b[1] - $a[1];
                    }

                    usort($similar_news, 'compareOrder');
                    $conds = "";
                    if(!empty($currentNews['NewsCategory']['Parent'])) {
                        $temp = $currentNews['NewsCategory']['Parent']['name'];
                    } else {
                        $temp = $currentNews['NewsCategory']['name'];
                    }
                    $seeAlsoNews = ClassRegistry::init("SeeAlsoFeature")->find("first",[
                        "conditions" => [
                            "SeeAlsoFeature.parent_category" => $temp,
                        ],
                        "recursive" => 3,
                    ]);
                    $commentNews = ClassRegistry::init("NewsComment")->find("all",[
                        "conditions" => [
                            "NewsComment.news_id" => $news_id,
                            "NewsComment.comment_status_id" => 1,
                        ],
                        "order" => "NewsComment.created desc",
                        "limit" => 2,
                        "recursive" => 3,
                    ]);
                    $this->set(compact("similar_news", "seeAlsoNews", "commentNews", "news_id"));
                    $this->set(compact("currentNews"));
                } else {
                    $this->redirect("/m");
                }
                break;
            case "detail_photo_news":
                $news_id = $path[0];
                $dataNews = ClassRegistry::init("News")->find("first",["conditions" => ["News.id" => $news_id]]);
                if($dataNews['News']['news_status_id'] == 3) {
                    $currentNews = ClassRegistry::init("News")->find("first", [
                        "conditions" => [
                            "News.id" => $news_id
                        ],
                        "recursive" => 2,
                    ]);
                    $hit = [];
                    $hit['News']['hits'] = $currentNews['News']['hits'] + 1;
                    $hit['News']['id'] = $news_id;
                    ClassRegistry::init("News")->saveAll($hit);
                    $similar_news = [];
                    $metakey_current_news = $currentNews['News']['meta_key'];
                    $all_news = ClassRegistry::init("News")->find("all");
                    foreach ($all_news as $k => $news) {
                        if ($news['News']['id'] != $news_id) {
                            $count_similar = $this->count_similar($metakey_current_news, $news['News']['meta_key']);
                            if ($count_similar > 0) {
                                $similar_news[] = array($news, $count_similar);
                            }
                        }
                    }

                    function compareOrder($a, $b) {
                        return $b[1] - $a[1];
                    }

                    usort($similar_news, 'compareOrder');
                    $commentNews = ClassRegistry::init("NewsComment")->find("all",[
                        "conditions" => [
                            "NewsComment.news_id" => $news_id,
                            "NewsComment.comment_status_id" => 1,
                        ],
                        "order" => "NewsComment.created desc",
                        "limit" => 2,
                        "recursive" => 3,
                    ]);
                    $this->set(compact("similar_news", "commentNews", "news_id"));
                    $this->set(compact("currentNews"));
                } else {
                    $this->redirect("/m");
                }
                break;
            case "detail_video_news":
                $news_id = $path[0];
                $dataNews = ClassRegistry::init("News")->find("first",["conditions" => ["News.id" => $news_id]]);
                if($dataNews['News']['news_status_id'] == 3) {
                    $currentNews = ClassRegistry::init("News")->find("first", [
                        "conditions" => [
                            "News.id" => $news_id
                        ],
                        "recursive" => 2,
                    ]);
                    $hitData = [];
                    $hitData['News']['hits'] = $currentNews['News']['hits'] + 1;
                    $hitData['News']['id'] = $news_id;
                    ClassRegistry::init("News")->saveAll($hitData);
                    $similar_news = [];
                    $metakey_current_news = $currentNews['News']['meta_key'];
                    $all_news = ClassRegistry::init("News")->find("all");
                    foreach ($all_news as $k => $news) {
                        if ($news['News']['id'] != $news_id) {
                            $count_similar = $this->count_similar($metakey_current_news, $news['News']['meta_key']);
                            if ($count_similar > 0) {
                                $similar_news[] = array($news, $count_similar);
                            }
                        }
                    }

                    function compareOrder($a, $b) {
                        return $b[1] - $a[1];
                    }

                    usort($similar_news, 'compareOrder');
                    $this->set(compact("similar_news"));
                    $this->set(compact("currentNews"));
                } else {
                    $this->redirect("/m");
                }
                break;
            case "home" :
                $recentNews = ClassRegistry::init("News")->find("all", [
                    "conditions" => [
                        "News.news_status_id" => 3,
                    ],
                    "recursive" => 3,
                    "order" => "News.news_date desc",
                    "limit" => 10,
                ]);
                $recommended_news = ClassRegistry::init("News")->find("all", [
                    "conditions" => [
                        "News.news_status_id" => 3,
                        "News.is_recommended" => 1,
                    ],
                    "recursive" => 3,
                    "order" => "News.popular_rate desc",
                    "limit" => 10,
                ]);
                $news_popular = ClassRegistry::init("News")->find("all", [
                    "conditions" => [
                        "News.news_status_id" => 3,
                    ],
                    "recursive" => 3,
                    "order" => "News.popular_rate desc",
                    "limit" => 10,
                ]);
                $slideshowRecentNews = ClassRegistry::init("Slideshow")->find("first", [
                    "conditions" => [
                        "Slideshow.slideshow_type_id" => 2,
                        "Slideshow.showing_status_id" => 1,
                        "Slideshow.name" => "Slideshow Home Mobile Berita Terkini",
                    ],
                    "recursive" => 3,
                ]);
                $slideshowPopularNews = ClassRegistry::init("Slideshow")->find("first", [
                    "conditions" => [
                        "Slideshow.slideshow_type_id" => 2,
                        "Slideshow.showing_status_id" => 1,
                        "Slideshow.name" => "Slideshow Home Mobile Berita Populer",
                    ],
                    "recursive" => 3,
                ]);
                $slideshowRecommendedNews = ClassRegistry::init("Slideshow")->find("first", [
                    "conditions" => [
                        "Slideshow.slideshow_type_id" => 2,
                        "Slideshow.showing_status_id" => 1,
                        "Slideshow.name" => "Slideshow Home Mobile Berita Rekomendasi",
                    ],
                    "recursive" => 3,
                ]);
                $this->set("newsPopulars", $news_popular);
                $this->set(compact("recentNews", "slideshowRecentNews", "slideshowPopularNews", "slideshowRecommendedNews"));
                $this->set("recommendedNews", $recommended_news);
                break;
            case "profile" :
                if (!$this->Session->check("credential.member")) {
                    $this->Session->setFlash(__(""), 'default', array(), 'belum-login');
                    $this->redirect("/m/login");
                } else {
                    $member_news_article = ClassRegistry::init("News")->find("all", [
                        "conditions" => [
                            "News.news_type_id" => 1,
                            "News.news_status_id" => 3,
                            "News.author_id" => $this->Session->read("credential.member.Account.id"),
                            "News.is_citizen_report" => 1,
                        ],
                        "order" => "News.news_date",
//                        "limit" => 3,
                    ]);
                    $member_news_photo = ClassRegistry::init("News")->find("all", [
                        "conditions" => [
                            "News.news_type_id" => 2,
                            "News.news_status_id" => 3,
                            "News.author_id" => $this->Session->read("credential.member.Account.id"),
                            "News.is_citizen_report" => 1,
                        ],
                        "order" => "News.news_date",
//                        "limit" => 6,
                    ]);
                    $member_news_video = ClassRegistry::init("News")->find("all", [
                        "conditions" => [
                            "News.news_type_id" => 3,
                            "News.news_status_id" => 3,
                            "News.author_id" => $this->Session->read("credential.member.Account.id"),
                            "News.is_citizen_report" => 1,
                        ],
                        "order" => "News.news_date",
//                        "limit" => 6,
                    ]);
                    $this->set(compact("member_news_article", "member_news_photo", "member_news_video"));
                }
                break;
            case "reset_password" :
                $token = $path[0];
                $data = ClassRegistry::init("PasswordReset")->find("first", [
                    "conditions" => [
                        "PasswordReset.token" => $token,
                    ],
                    "contain" => [
                        "Account" => [
                            "User",
                        ]
                    ]
                ]);
                $now = new DateTime();
                if (is_null($token) || empty($data) || $data['PasswordReset']['is_used'] || $now > new DateTime($data['PasswordReset']['expire'])) {
                    $this->Session->setFlash(__(""), 'default', array(), 'reset-password-gagal');
                    $this->redirect("/m/login");
                }
                if ($this->request->is("post")) {
                    $current_password = $this->data['User']['password'];
                    $repeat_password = $this->data['User']['repeat_password'];
                    if ($current_password != $repeat_password) {
                        $this->Session->setFlash(__(""), 'default', array(), 'reset-password-email-tidak-sama');
                        $this->redirect("/m/reset-password");
                    }
                    $this->loadModel("Account");
                    $this->Account->data = $this->data;
                    if ($this->Account->saveAll($this->Account->data, array('validate' => 'only'))) {
                        $password = $current_password;
                        $salt = $data['Account']['User']['salt'];
                        $encrypt = $this->_hashPassword($password . $salt);
                        $this->Account->data["Account"]["id"] = $data['Account']['id'];
                        $this->Account->data["User"]["id"] = $data['Account']['User']['id'];
                        $this->Account->data["PasswordReset"]["id"] = $data['PasswordReset']['id'];
                        $this->Account->data["User"]["password"] = $encrypt;
                        $this->Account->data["PasswordReset"]["is_used"] = true;
                        unset($this->Account->data["User"]["repeat_password"]);
                        $this->Account->saveAll($this->Account->data, array("deep" => true));
                        $this->Session->setFlash(__(""), 'default', array(), 'reset-password-sukses');
                        $this->redirect("/m/login");
                    } else {
                        $this->Session->setFlash(__(""), 'default', array(), 'reset-password-gagal');
                    }
                }
                break;
            case "category":
                $category_type = $path[0];
                if (isset($this->request->query['page']) && !empty($this->request->query['page'])) {
                    $pageNum = $this->request->query['page'];
                } else {
                    $pageNum = 1;
                }
                if (isset($this->request->query['limit']) && !empty($this->request->query['limit'])) {
                    $limit = $this->request->query['limit'];
                } else {
                    $limit = 5;
                }
                $linkedCategories = $this->_getAllLinkedCategory($path[0]);
                $conds = [
                    "NewsCategory.uniq" => $linkedCategories,
                    "News.is_citizen_report" => 0,
                    "News.news_status_id" => 3,
                ];
                $allNews = $this->_allNews($conds, $pageNum, $limit);
                $paginationInfo = $this->_paginationInfo($conds, $pageNum, $limit);
//                $this->set("currentNews", $allNews);
//                $this->set("currentNewsFilter", ["page" => $pageNum, "limit" => $limit, "category" => $linkedCategories]);
                if (($key = array_search($path[0], $linkedCategories)) !== false) {
                    unset($linkedCategories[$key]);
                }
                $childCategories = [];
                $parentCategories = [];
                foreach ($linkedCategories as $linkedCategory) {
                    $d = ClassRegistry::init("NewsCategory")->find("first", [
                        "conditions" => [
                            "NewsCategory.uniq" => $linkedCategory,
                        ]
                    ]);

                    $childCategories[] = $d;
                }
                $parent = ClassRegistry::init("NewsCategory")->find("first", [
                    "conditions" => [
                        "NewsCategory.uniq" => $path[0],
                    ]
                ]);
                $category_news = ClassRegistry::init("News")->find("all", [
                    "conditions" => [
                        "News.news_status_id" => 3,
                        "NewsCategory.uniq" => $this->_getAllLinkedCategory($category_type),
                    ],
                    "recursive" => 3,
                    "order" => "News.news_date desc",
                    "limit" => 10,
                ]);
                $parentCategories[] = $parent;
                $this->set("childCategories", $childCategories);
                $this->set("parentCategories", $parentCategories);
                $this->set("categoryType", $category_type);
                $this->set("categoryNews", $category_news);
                break;
            case "event" :
                $events = ClassRegistry::init("Event")->find("all", [
                    "conditions" => [
                        "Event.event_status_id" => 1,
                    ],
                    "order" => "Event.created desc",
                    "contain" => [
                        "EventImage" => [
                            "conditions" => [
                                "EventImage.default_image" => 1,
                            ]
                        ]
                    ]
                ]);
                $this->set("events", $events);
                break;
            case "detail_event":
                $event_id = $path[0];
                $this->set("currentEvent", ClassRegistry::init("Event")->find("first", [
                            "conditions" => [
                                "Event.id" => $event_id
                            ],
                            "recursive" => 2,
                ]));
                $this->set("thumbnail_event", ClassRegistry::init("Event")->find("first", [
                            "conditions" => [
                                "Event.id" => $event_id,
                            ],
                            "recursive" => 2,
                            "contain" => [
                                "EventImage" => [
                                    "conditions" => [
                                        "EventImage.default_image" => 1,
                                    ]
                                ]
                            ]
                ]));
                break;
            case "citizen_report" :
                $condNews = [];
                if (!isset($this->request->query["type"]) || empty($this->request->query["type"])) {
                    
                } else {
                    switch ($this->request->query["type"]) {
                        case "berita" :
                            $condNews["News.news_type_id"] = 1;
                            break;
                        case "foto" :
                            $condNews['News.news_type_id'] = 2;
                            break;
                        case "video" :
                            $condNews['News.news_type_id'] = 3;
                            break;
                    }
                }
                $citizen_report = ClassRegistry::init("News")->find("all", [
                    "conditions" => [
                        "News.is_citizen_report" => 1,
                        "News.news_status_id" => 3,
                        $condNews
                    ],
                    "order" => "News.news_date desc",
                    "recursive" => 3,
                ]);
                $recentNews = ClassRegistry::init("News")->find("all", [
                    "order" => "News.news_date desc",
                    "limit" => 10,
                    "recursive" => 3,
                ]);
                $this->set(compact("recentNews"));
                $this->set("citizen_report", $citizen_report);
                break;
            case "detail_citizen_report":
                $citizen_report_id = $path[0];
                $dataNews = ClassRegistry::init("News")->find("first",["conditions" => ["News.id" => $citizen_report_id]]);
                if($dataNews['News']['news_status_id'] == 3) {
                    $this->set("currentCitizenReport", ClassRegistry::init("News")->find("first", [
                                "conditions" => [
                                    "News.id" => $citizen_report_id
                                ],
                                "recursive" => 2,
                    ]));
                    $currentNews = ClassRegistry::init("News")->find("first", [
                        "conditions" => [
                            "News.id" => $citizen_report_id,
                            "News.is_citizen_report" => 1,
                        ],
                        "recursive" => 2,
                    ]);
                    $similar_news = [];
                    $metakey_current_news = $currentNews['News']['meta_key'];
                    $all_news = ClassRegistry::init("News")->find("all", [
                        "conditions" => [
                            "News.is_citizen_report" => 1,
                            "News.news_status_id" => 3,
                        ]
                    ]);
                    foreach ($all_news as $k => $news) {
                        if ($news['News']['id'] != $citizen_report_id) {
                            $count_similar = $this->count_similar($metakey_current_news, $news['News']['meta_key']);
                            if ($count_similar > 0) {
                                $similar_news[] = array($news, $count_similar);
                            }
                        }
                    }

                    function compareOrder($a, $b) {
                        return $b[1] - $a[1];
                    }

                    usort($similar_news, 'compareOrder');
                    $similar_news = array_slice($similar_news, 0, 3);
                    $conds = "";
                    if(!empty($currentNews['NewsCategory']['Parent'])) {
                        $temp = $currentNews['NewsCategory']['Parent']['name'];
                    } else {
                        $temp = $currentNews['NewsCategory']['name'];
                    }
                    $seeAlsoNews = ClassRegistry::init("SeeAlsoFeature")->find("first",[
                        "conditions" => [
                            "SeeAlsoFeature.parent_category" => $temp,
                        ],
                        "recursive" => 3,
                    ]);
                    $commentNews = ClassRegistry::init("NewsComment")->find("all",[
                        "conditions" => [
                            "NewsComment.news_id" => $citizen_report_id,
                            "NewsComment.comment_status_id" => 1,
                        ],
                        "order" => "NewsComment.created desc",
                        "limit" => 2,
                        "recursive" => 3,
                    ]);
                    $this->set(compact("similar_news", "seeAlsoNews", "commentNews", "citizen_report_id"));
                } else {
                    $this->redirect("/m");
                }
                break;
            case "search":
                $searchResult = [];
                if (isset($this->request->query["term"]) && !empty($this->request->query["term"])) {
                    if (isset($this->request->query['page']) && !empty($this->request->query['page'])) {
                        $pageNum = $this->request->query['page'];
                    } else {
                        $pageNum = 1;
                    }
                    if (isset($this->request->query['limit']) && !empty($this->request->query['limit'])) {
                        $limit = $this->request->query['limit'];
                    } else {
                        $limit = 3;
                    }
                    $order = "News.news_date";
                    $terms = [$this->request->query["term"]];
                    $terms = am($terms, explode(" ", $this->request->query["term"]));
                    $spTerms = function($term) {
                        return "%$term%";
                    };
                    $terms = array_map($spTerms, $terms);
                    $conds = [];
                    foreach ($terms as $term) {
                        $conds[] = "News.title_ind like '$term'";
                    }
                    $searchResult = ClassRegistry::init("News")->find("all", [
                        "conditions" => [
                            "AND" => [
                                "News.news_status_id" => 3,
                                $conds,
                            ],
                        ],
                        "limit" => $limit,
                        "page" => $pageNum,
                        "order" => $order,
                    ]);
                    $paginationInfo = $this->_paginationInfo($conds, $pageNum, $limit, $order);
                }
                $this->set(compact("searchResult", "terms"));
                $this->set(compact("paginationInfo"));
                break;
            case "gallery_photo" :
                $recentNews = ClassRegistry::init("News")->find("all", [
                    "conditions" => [
                        "News.news_status_id" => 3,
                        "News.news_type_id" => 2,
                    ],
                    "order" => "News.news_date desc",
                    "limit" => 10,
                ]);
                $recommended_news = ClassRegistry::init("News")->find("all", [
                    "conditions" => [
                        "News.news_status_id" => 3,
                        "News.is_recommended" => 1,
                        "News.news_type_id" => 2,
                    ],
                    "order" => "News.popular_rate desc",
                    "limit" => 10,
                ]);
                $news_popular = ClassRegistry::init("News")->find("all", [
                    "conditions" => [
                        "News.news_status_id" => 3,
                        "News.news_type_id" => 2,
                    ],
                    "order" => "News.popular_rate desc",
                    "limit" => 10,
                ]);
                $this->set("newsPopulars", $news_popular);
                $this->set(compact("recentNews"));
                $this->set("recommendedNews", $recommended_news);
                break;
            case "gallery_video" :
                $recentNews = ClassRegistry::init("News")->find("all", [
                    "conditions" => [
                        "News.news_status_id" => 3,
                        "News.news_type_id" => 3,
                    ],
                    "order" => "News.news_date desc",
                    "limit" => 10,
                ]);
                $recommended_news = ClassRegistry::init("News")->find("all", [
                    "conditions" => [
                        "News.news_status_id" => 3,
                        "News.is_recommended" => 1,
                        "News.news_type_id" => 3,
                    ],
                    "order" => "News.popular_rate desc",
                    "limit" => 10,
                ]);
                $news_popular = ClassRegistry::init("News")->find("all", [
                    "conditions" => [
                        "News.news_status_id" => 3,
                        "News.news_type_id" => 3,
                    ],
                    "order" => "News.popular_rate desc",
                    "limit" => 10,
                ]);
                $this->set("newsPopulars", $news_popular);
                $this->set(compact("recentNews"));
                $this->set("recommendedNews", $recommended_news);
                break;
        }
        try {
            $this->render($this->frontTemplate . '/mobile/' . $page);
        } catch (MissingViewException $e) {
            if (Configure::read('debug')) {
                throw $e;
            }
            throw new NotFoundException();
        }
    }

    public function _render($path) {
        $count = count($path);
        if (!$count) {
            $path[] = 'ID';
            $path[] = "index";
        }
        $page = $subpage = $title_for_layout = null;

        if (!empty($path[1])) {
            $page = $path[$count - 1];
        }
        if (!empty($path[2])) {
            $subpage = $path[2];
        }
        if (!empty($path[$count - 1])) {
            $title_for_layout = Inflector::humanize($path[$count - 1]);
        }
        $categoryNews = ClassRegistry::init("News")->find("all", [
            "conditions" => [
                "News.news_status_id" => 3,
                "NewsCategory.uniq" => $this->_getAllLinkedCategory("news"),
            ],
            "recursive" => 3,
            "order" => "News.news_date desc",
            "limit" => 8,
        ]);
        $categoryBusiness = ClassRegistry::init("News")->find("all", [
            "conditions" => [
                "News.news_status_id" => 3,
                "NewsCategory.uniq" => $this->_getAllLinkedCategory("bisnis"),
            ],
            "recursive" => 3,
            "order" => "News.news_date desc",
            "limit" => 8,
        ]);
        $categoryTekno = ClassRegistry::init("News")->find("all", [
            "conditions" => [
                "News.news_status_id" => 3,
                "NewsCategory.uniq" => $this->_getAllLinkedCategory("tekno"),
            ],
            "recursive" => 3,
            "order" => "News.news_date desc",
            "limit" => 8,
        ]);
        $categoryLifestyle = ClassRegistry::init("News")->find("all", [
            "conditions" => [
                "News.news_status_id" => 3,
                "NewsCategory.uniq" => $this->_getAllLinkedCategory("lifestyle"),
            ],
            "recursive" => 3,
            "order" => "News.news_date desc",
            "limit" => 8,
        ]);
        $categorySport = ClassRegistry::init("News")->find("all", [
            "conditions" => [
                "News.news_status_id" => 3,
                "NewsCategory.uniq" => $this->_getAllLinkedCategory("sport"),
            ],
            "recursive" => 3,
            "order" => "News.news_date desc",
            "limit" => 8,
        ]);
        $categoryGallery = ClassRegistry::init("News")->find("all", [
            "conditions" => [
                "News.news_status_id" => 3,
                "NewsCategory.uniq" => $this->_getAllLinkedCategory("gallery"),
            ],
            "recursive" => 3,
            "order" => "News.news_date desc",
            "limit" => 8,
        ]);
        $events = ClassRegistry::init("Event")->find("all", [
            "conditions" => [
                "Event.event_status_id" => 1,
            ],
            "order" => "Event.created desc",
            "limit" => 3,
            "contain" => [
                "EventImage" => [
                    "conditions" => [
                        "EventImage.default_image" => 1,
                    ]
                ]
            ]
        ]);
        $recommended_news = ClassRegistry::init("News")->find("all", [
            "conditions" => [
                "News.news_status_id" => 3,
                "News.is_recommended" => 1,
                "News.is_deleted" => 0,
            ],
            "order" => "News.popular_rate desc",
            "limit" => 12,
        ]);
        $this->set("events", $events);
        $this->set("categoryNews", $categoryNews);
        $this->set("categoryBusiness", $categoryBusiness);
        $this->set("categoryTekno", $categoryTekno);
        $this->set("categoryLifestyle", $categoryLifestyle);
        $this->set("categorySport", $categorySport);
        $this->set("categoryGallery", $categoryGallery);
        $this->set(compact("recommended_news"));
        $this->set(compact('front', 'subpage', 'title_for_layout', 'page'));
        switch ($page) {
            case "indeks":
                if (isset($this->request->query["find_start"]) && !empty($this->request->query["find_start"]) && isset($this->request->query["find_end"]) && !empty($this->request->query["find_end"])) {
                    $startNewsDate = $this->request->query["find_start"];
                    $endNewsDate = $this->request->query["find_end"];
                } else {
                    $startNewsDate = date("Y-m-d");
                    $endNewsDate = date("Y-m-d");
                }
                $result = [];
                $categories = ClassRegistry::init("NewsCategory")->find("all");
                foreach ($categories as $category) {
                    $result[$category["NewsCategory"]["uniq"]] = [
                        "allLinked" => $this->_getAllLinkedCategory($category["NewsCategory"]["uniq"]),
                        "data" => [],
                    ];
                }
                $allNews = ClassRegistry::init("News")->find("all", [
                    "conditions" => [
                        "Date(News.created) >=" => $startNewsDate,
                        "Date(News.created) <=" => $endNewsDate,
                        "News.news_status_id" => 3,
                        "News.is_deleted" => 0,
                    ],
                    "contain" => [
                        "NewsCategory",
                    ],
                    "order" => "News.news_date desc",
                ]);
                foreach ($allNews as $item) {
                    foreach ($result as $k => $entity) {
                        if (array_search($item["NewsCategory"]['uniq'], $entity["allLinked"]) !== false) {
                            $result[$k]["data"][] = $item;
                        }
                    }
                }
                $this->set(compact("result", "allNews", "startNewsDate", "endNewsDate"));
                break;
            case "detail_news":
                $news_id = $path[0];
                $dataNews = ClassRegistry::init("News")->find("first",["conditions" => ["News.id" => $news_id]]);
                if($dataNews['News']['news_status_id'] == 3) {
                    $currentNews = ClassRegistry::init("News")->find("first", [
                        "conditions" => [
                            "News.id" => $news_id,
                            "News.is_deleted" => 0,
                        ],
                        "recursive" => 2,
                    ]);
                    $hitData = [];
                    $hitData['News']['hits'] = $currentNews['News']['hits'] + 1;
                    $hitData['News']['id'] = $news_id;
                    ClassRegistry::init("News")->saveAll($hitData);
                    $similar_news = [];
                    $metakey_current_news = $currentNews['News']['meta_key'];
                    $all_news = ClassRegistry::init("News")->find("all");
                    foreach ($all_news as $k => $news) {
                        if ($news['News']['id'] != $news_id) {
                            $count_similar = $this->count_similar($metakey_current_news, $news['News']['meta_key']);
                            if ($count_similar > 0) {
                                $similar_news[] = array($news, $count_similar);
                            }
                        }
                    }
                    function compareOrder($a, $b) {
                        return $b[1] - $a[1];
                    }
                    usort($similar_news, 'compareOrder');
                    $videoNews = ClassRegistry::init("News")->find("all",[
                        "conditions" => [
                            "News.news_status_id" => 3,
                            "News.news_type_id" => 3,
                            "News.is_deleted" => 0,
                        ],
                        "order" => "News.popular_rate desc",
                        "limit" => 12,
                    ]);
                    $conds = "";
                    if(!empty($currentNews['NewsCategory']['Parent'])) {
                        $temp = $currentNews['NewsCategory']['Parent']['name'];
                    } else {
                        $temp = $currentNews['NewsCategory']['name'];
                    }
                    $seeAlsoNews = ClassRegistry::init("SeeAlsoFeature")->find("first",[
                        "conditions" => [
                            "SeeAlsoFeature.parent_category" => $temp,
                        ],
                        "recursive" => 3,
                    ]);
                    $commentNews = ClassRegistry::init("NewsComment")->find("all",[
                        "conditions" => [
                            "NewsComment.news_id" => $news_id,
                            "NewsComment.comment_status_id" => 1,
                        ],
                        "order" => "NewsComment.created desc",
                        "limit" => 2,
                        "recursive" => 3,
                    ]);
                    $this->set(compact("similar_news", "videoNews", "seeAlsoNews", "commentNews", "news_id"));
                    $this->set(compact("currentNews"));
                } else {
                    $this->redirect("/");
                }
                break;
            case "detail_photo_news":
                $news_id = $path[0];
                $dataNews = ClassRegistry::init("News")->find("first",["conditions" => ["News.id" => $news_id]]);
                if($dataNews['News']['news_status_id'] == 3) {
                    $currentNews = ClassRegistry::init("News")->find("first", [
                        "conditions" => [
                            "News.id" => $news_id,
                            "News.is_deleted" => 0,
                        ],
                        "recursive" => 2,
                    ]);
                    $hit = [];
                    $hit['News']['hits'] = $currentNews['News']['hits'] + 1;
                    $hit['News']['id'] = $news_id;
                    ClassRegistry::init("News")->saveAll($hit);
                    $similar_news = [];
                    $metakey_current_news = $currentNews['News']['meta_key'];
                    $all_news = ClassRegistry::init("News")->find("all");
                    foreach ($all_news as $k => $news) {
                        if ($news['News']['id'] != $news_id) {
                            $count_similar = $this->count_similar($metakey_current_news, $news['News']['meta_key']);
                            if ($count_similar > 0) {
                                $similar_news[] = array($news, $count_similar);
                            }
                        }
                    }

                    function compareOrder($a, $b) {
                        return $b[1] - $a[1];
                    }

                    usort($similar_news, 'compareOrder');
                    $commentNews = ClassRegistry::init("NewsComment")->find("all",[
                        "conditions" => [
                            "NewsComment.news_id" => $news_id,
                            "NewsComment.comment_status_id" => 1,
                        ],
                        "order" => "NewsComment.created desc",
                        "limit" => 2,
                        "recursive" => 3,
                    ]);
                    $this->set(compact("similar_news", "commentNews", "news_id"));
                    $this->set(compact("currentNews"));
                } else {
                    $this->redirect("/");
                }
                break;
            case "detail_event":
                $event_id = $path[0];
                $this->set("currentEvent", ClassRegistry::init("Event")->find("first", [
                            "conditions" => [
                                "Event.id" => $event_id
                            ],
                            "recursive" => 2,
                ]));
                $this->set("thumbnail_event", ClassRegistry::init("Event")->find("first", [
                            "conditions" => [
                                "Event.id" => $event_id,
                            ],
                            "recursive" => 2,
                            "contain" => [
                                "EventImage" => [
                                    "conditions" => [
                                        "EventImage.default_image" => 1,
                                    ]
                                ]
                            ]
                ]));
                break;
            case "kategori":
                $category_type = $path[0];
                if (isset($this->request->query['page']) && !empty($this->request->query['page'])) {
                    $pageNum = $this->request->query['page'];
                } else {
                    $pageNum = 1;
                }
                if (isset($this->request->query['limit']) && !empty($this->request->query['limit'])) {
                    $limit = $this->request->query['limit'];
                } else {
                    $limit = 10;
                }
                $linkedCategories = $this->_getAllLinkedCategory($path[0]);
                $conds = [
                    "NewsCategory.uniq" => $linkedCategories,
                    "News.is_citizen_report" => 0,
                    "News.news_status_id" => 3,
                    "News.is_deleted" => 0,
                ];
                $allNews = $this->_allNews($conds, $pageNum, $limit);
                $paginationInfo = $this->_paginationInfo($conds, $pageNum, $limit);
                $this->set("currentNews", $allNews);
                $this->set("currentNewsFilter", ["page" => $pageNum, "limit" => $limit, "category" => $linkedCategories]);
                if (($key = array_search($path[0], $linkedCategories)) !== false) {
                    unset($linkedCategories[$key]);
                }
                $childCategories = [];
                $parentCategories = [];
                foreach ($linkedCategories as $linkedCategory) {
                    $d = ClassRegistry::init("NewsCategory")->find("first", [
                        "conditions" => [
                            "NewsCategory.uniq" => $linkedCategory,
                        ]
                    ]);

                    $childCategories[] = $d;
                }
                $parent = ClassRegistry::init("NewsCategory")->find("first", [
                    "conditions" => [
                        "NewsCategory.uniq" => $path[0],
                    ]
                ]);
                $parentCategories[] = $parent;
                $this->set("childCategories", $childCategories);
                $this->set("parentCategories", $parentCategories);
                $this->set("categoryType", $category_type);
                break;
            case "profile_member" :
                if (!$this->Session->check("credential.member")) {
                    $this->Session->setFlash(__(""), 'default', array(), 'belum-login');
                    $this->redirect("/login-register");
                } else {
                    $member_news_article = ClassRegistry::init("News")->find("all", [
                        "conditions" => [
                            "News.news_type_id" => 1,
                            "News.news_status_id" => 3,
                            "News.author_id" => $this->Session->read("credential.member.Account.id"),
                            "News.is_deleted" => 0,
                        ],
                        "order" => "News.news_date",
                        "limit" => 3,
                    ]);
                    $member_news_photo = ClassRegistry::init("News")->find("all", [
                        "conditions" => [
                            "News.news_type_id" => 2,
                            "News.news_status_id" => 3,
                            "News.author_id" => $this->Session->read("credential.member.Account.id"),
                            "News.is_deleted" => 0,
                        ],
                        "order" => "News.news_date",
                        "limit" => 6,
                    ]);
                    $member_news_video = ClassRegistry::init("News")->find("all", [
                        "conditions" => [
                            "News.news_type_id" => 3,
                            "News.news_status_id" => 3,
                            "News.author_id" => $this->Session->read("credential.member.Account.id"),
                            "News.is_deleted" => 0,
                        ],
                        "order" => "News.news_date",
                        "limit" => 6,
                    ]);
                    $this->set(compact("member_news_article", "member_news_photo", "member_news_video"));
                }
                break;
            case "citizen_report" :
                $condNews = [];
                if (!isset($this->request->query["type"]) || empty($this->request->query["type"])) {
                    
                } else {
                    switch ($this->request->query["type"]) {
                        case "berita" :
                            $condNews["News.news_type_id"] = 1;
                            break;
                        case "foto" :
                            $condNews['News.news_type_id'] = 2;
                            break;
                        case "video" :
                            $condNews['News.news_type_id'] = 3;
                            break;
                    }
                }
                $citizen_report = ClassRegistry::init("News")->find("all", [
                    "conditions" => [
                        "News.is_citizen_report" => 1,
                        "News.news_status_id" => 3,
                        "News.is_deleted" => 0,
                        $condNews
                    ],
                    "order" => "News.news_date desc",
                    "limit" => 12,
                    "recursive" => 3,
                ]);
                $this->set("citizen_report", $citizen_report);
                break;
            case "detail_citizen_report":
                $citizen_report_id = $path[0];
                $dataNews = ClassRegistry::init("News")->find("first",["conditions" => ["News.id" => $citizen_report_id]]);
                if($dataNews['News']['news_status_id'] == 3) {
                    $this->set("currentCitizenReport", ClassRegistry::init("News")->find("first", [
                                "conditions" => [
                                    "News.id" => $citizen_report_id,
                                    "News.is_deleted" => 0,
                                ],
                                "recursive" => 2,
                    ]));
                    $similar_news = [];
                    $currentNews = ClassRegistry::init("News")->find("first", [
                        "conditions" => [
                            "News.id" => $citizen_report_id,
                            "News.is_citizen_report" => 1,
                            "News.is_deleted" => 0,
                        ],
                        "recursive" => 2,
                    ]);
                    $metakey_current_news = $currentNews['News']['meta_key'];
                    $all_news = ClassRegistry::init("News")->find("all");
                    foreach ($all_news as $k => $news) {
                        if ($news['News']['id'] != $citizen_report_id) {
                            $count_similar = $this->count_similar($metakey_current_news, $news['News']['meta_key']);
                            if ($count_similar > 0) {
                                $similar_news[] = array($news, $count_similar);
                            }
                        }
                    }

                    function compareOrder($a, $b) {
                        return $b[1] - $a[1];
                    }

                    usort($similar_news, 'compareOrder');
                    $conds = "";
                    if(!empty($currentNews['NewsCategory']['Parent'])) {
                        $temp = $currentNews['NewsCategory']['Parent']['name'];
                    } else {
                        $temp = $currentNews['NewsCategory']['name'];
                    }
                    $seeAlsoNews = ClassRegistry::init("SeeAlsoFeature")->find("first",[
                        "conditions" => [
                            "SeeAlsoFeature.parent_category" => $temp,
                        ],
                        "recursive" => 3,
                    ]);
                    $commentNews = ClassRegistry::init("NewsComment")->find("all",[
                        "conditions" => [
                            "NewsComment.news_id" => $citizen_report_id,
                            "NewsComment.comment_status_id" => 1,
                        ],
                        "order" => "NewsComment.created desc",
                        "limit" => 2,
                        "recursive" => 3,
                    ]);
                    $this->set("news_id", $citizen_report_id);
                    $this->set(compact("similar_news", "seeAlsoNews", "commentNews"));
                } else {
                    $this->redirect("/");
                }
                break;
            case "detail_citizen_report_photo_news":
                $citizen_report_id = $path[0];
                $dataNews = ClassRegistry::init("News")->find("first",["conditions" => ["News.id" => $citizen_report_id]]);
                if($dataNews['News']['news_status_id'] == 3) {
                    $this->set("currentCitizenReport", ClassRegistry::init("News")->find("first", [
                                "conditions" => [
                                    "News.id" => $citizen_report_id
                                ],
                                "recursive" => 2,
                    ]));
                    $similar_news = [];
                    $currentNews = ClassRegistry::init("News")->find("first", [
                        "conditions" => [
                            "News.id" => $citizen_report_id,
                            "News.is_citizen_report" => 1,
                            "News.is_deleted" => 0,
                        ],
                        "recursive" => 2,
                    ]);
                    $metakey_current_news = $currentNews['News']['meta_key'];
                    $all_news = ClassRegistry::init("News")->find("all");
                    foreach ($all_news as $k => $news) {
                        if ($news['News']['id'] != $citizen_report_id) {
                            $count_similar = $this->count_similar($metakey_current_news, $news['News']['meta_key']);
                            if ($count_similar > 0) {
                                $similar_news[] = array($news, $count_similar);
                            }
                        }
                    }

                    function compareOrder($a, $b) {
                        return $b[1] - $a[1];
                    }

                    usort($similar_news, 'compareOrder');
                    $commentNews = ClassRegistry::init("NewsComment")->find("all",[
                        "conditions" => [
                            "NewsComment.news_id" => $citizen_report_id,
                            "NewsComment.comment_status_id" => 1,
                        ],
                        "order" => "NewsComment.created desc",
                        "limit" => 2,
                        "recursive" => 3,
                    ]);
                    $this->set("news_id", $citizen_report_id);
                    $this->set(compact("similar_news", "commentNews"));
                } else {
                    $this->redirect("/");
                }
                break;
            case "homex" :
                $citizen_report = ClassRegistry::init("News")->find("all", [
                    "conditions" => [
                        "News.is_citizen_report" => 1,
                        "News.news_status_id" => 3,
                        "News.is_deleted" => 0,
                    ],
                    "order" => "News.news_date desc",
                    "limit" => 12,
                    "recursive" => 3,
                ]);
                $slideshow_news = ClassRegistry::init("Slideshow")->find("all", [
                    "conditions" => [
                        "Slideshow.showing_status_id" => 1,
                        "Slideshow.slideshow_type_id" => 1,
                    ],
                    "order" => "Slideshow.created desc",
                    "recursive" => 3,
                ]);
//                $news_video_popular = ClassRegistry::init("Slideshow")->find("all", [
//                    "conditions" => [
//                        "Slideshow.showing_status_id" => 1,
//                        "Slideshow.name" => "Video Populer",
//                    ],
//                    "order" => "Slideshow.created desc",
//                    "recursive" => 3,
//                ]);
                $news_video_popular = ClassRegistry::init("News")->find("all", [
                    "conditions" => [
                        "News.news_type_id" => 3,
                        "News.news_status_id" => 3,
                    ],
                    "order" => "News.popular_rate desc",
                    "recursive" => 3,
                    "limit" => 12,
                ]);
                $news_photo_popular = ClassRegistry::init("News")->find("all", [
                    "conditions" => [
                        "News.news_type_id" => 2,
                        "News.news_status_id" => 3,
                    ],
                    "order" => "News.popular_rate desc",
                    "limit" => 12,
                ]);
                $this->set("news_video_popular", $news_video_popular);
                $this->set("news_photo_popular", $news_photo_popular);
                $this->set("slideshow_news", $slideshow_news);
                $this->set("citizen_report", $citizen_report);
                $this->set("slideshow_news", $slideshow_news);
                $this->set("citizen_report", $citizen_report);
                break;
            case "search":
                $searchResult = [];
                if (isset($this->request->query["term"]) && !empty($this->request->query["term"])) {
                    if (isset($this->request->query['page']) && !empty($this->request->query['page'])) {
                        $pageNum = $this->request->query['page'];
                    } else {
                        $pageNum = 1;
                    }
                    if (isset($this->request->query['limit']) && !empty($this->request->query['limit'])) {
                        $limit = $this->request->query['limit'];
                    } else {
                        $limit = 10;
                    }
                    $order = "News.news_date desc";
                    $terms = [$this->request->query["term"]];
                    $terms = am($terms, explode(" ", $this->request->query["term"]));
                    $spTerms = function($term) {
                        return "%$term%";
                    };
                    $terms = array_map($spTerms, $terms);
                    $conds = [];
                    foreach ($terms as $term) {
                        $conds[] = "News.title_ind like '$term'";
                    }
                    $searchResult = ClassRegistry::init("News")->find("all", [
                        "conditions" => [
                            "AND" => [
                                "News.news_status_id" => 3,
                                "News.is_deleted" => 0,
                                $conds,
                            ],
                        ],
                        "limit" => $limit,
                        "page" => $pageNum,
                        "order" => $order,
                    ]);
                    $paginationInfo = $this->_paginationInfo($conds, $pageNum, $limit, $order);
                }
                $this->set(compact("searchResult", "terms"));
                $this->set(compact("paginationInfo"));
                break;
            case "event" :
                $pageNumJan = 1;
                $pageNumFeb = 1;
                $pageNumMar = 1;
                $pageNumApril = 1;
                $pageNumMay = 1;
                $pageNumJune = 1;
                $pageNumJuly = 1;
                $pageNumAugust = 1;
                $pageNumSept = 1;
                $pageNumOkto = 1;
                $pageNumNov = 1;
                $pageNumDec = 1;
                if (isset($this->request->query['page']) && !empty($this->request->query['page'])) {
                    if($this->request->query['bulan'] == 1) {
                        $pageNumJan = $this->request->query['page'];
                    } else if($this->request->query['bulan'] == 2) {
                        $pageNumFeb = $this->request->query['page'];
                    } else if($this->request->query['bulan'] == 3) {
                        $pageNumMar = $this->request->query['page'];
                    }  else if($this->request->query['bulan'] == 4) {
                        $pageNumApril = $this->request->query['page'];
                    }  else if($this->request->query['bulan'] == 5) {
                        $pageNumMay = $this->request->query['page'];
                    } else if($this->request->query['bulan'] == 6) {
                        $pageNumJune = $this->request->query['page'];
                    } else if($this->request->query['bulan'] == 7) {
                        $pageNumJuly = $this->request->query['page'];
                    } else if($this->request->query['bulan'] == 8) {
                        $pageNumAugust = $this->request->query['page'];
                    } else if($this->request->query['bulan'] == 9) {
                        $pageNumSept = $this->request->query['page'];
                    } else if($this->request->query['bulan'] == 10) {
                        $pageNumOkto = $this->request->query['page'];
                    } else if($this->request->query['bulan'] == 11) {
                        $pageNumNov = $this->request->query['page'];
                    } else if($this->request->query['bulan'] == 12) {
                        $pageNumDec = $this->request->query['page'];
                    }       
                }
                if (isset($this->request->query['limit']) && !empty($this->request->query['limit'])) {
                    $limit = $this->request->query['limit'];
                } else {
                    $limit = 3;
                }
                $conds = [];
                $sort = "Event.date desc";
                $janEvents = ClassRegistry::init("Event")->find("all", [
                    "conditions" => [
                        "AND" => [
                            $conds,
                            "MONTH(Event.date) LIKE 1",
                        ],
                    ],
                    "order" => "Event.date desc",
                    "limit" => $limit,
                    "page" => $pageNumJan,
                    "contain" => [
                        "EventImage" => [
                            "conditions" => [
                                "EventImage.default_image" => 1,
                            ]
                        ]
                    ]
                ]);
                $febEvents = ClassRegistry::init("Event")->find("all", [
                    "conditions" => [
                        "AND" => [
                            $conds,
                            "MONTH(Event.date) LIKE 2",
                        ],
                    ],
                    "order" => "Event.date desc",
                    "limit" => $limit,
                    "page" => $pageNumFeb,
                    "contain" => [
                        "EventImage" => [
                            "conditions" => [
                                "EventImage.default_image" => 1,
                            ]
                        ]
                    ]
                ]);
                $marchEvents = ClassRegistry::init("Event")->find("all", [
                    "conditions" => [
                        "AND" => [
                            $conds,
                            "MONTH(Event.date) LIKE 3",
                        ],
                    ],
                    "order" => "Event.date desc",
                    "limit" => $limit,
                    "page" => $pageNumMar,
                    "contain" => [
                        "EventImage" => [
                            "conditions" => [
                                "EventImage.default_image" => 1,
                            ]
                        ]
                    ]
                ]);
                $aprilEvents = ClassRegistry::init("Event")->find("all", [
                    "conditions" => [
                        "AND" => [
                            $conds,
                            "MONTH(Event.date) LIKE 4",
                        ],
                    ],
                    "order" => "Event.date desc",
                    "limit" => $limit,
                    "page" => $pageNumApril,
                    "contain" => [
                        "EventImage" => [
                            "conditions" => [
                                "EventImage.default_image" => 1,
                            ]
                        ]
                    ]
                ]);
                $mayEvents = ClassRegistry::init("Event")->find("all", [
                    "conditions" => [
                        "AND" => [
                            $conds,
                            "MONTH(Event.date) LIKE 5",
                        ],
                    ],
                    "order" => "Event.date desc",
                    "limit" => $limit,
                    "page" => $pageNumMay,
                    "contain" => [
                        "EventImage" => [
                            "conditions" => [
                                "EventImage.default_image" => 1,
                            ]
                        ]
                    ]
                ]);
                $juneEvents = ClassRegistry::init("Event")->find("all", [
                    "conditions" => [
                        "AND" => [
                            $conds,
                            "MONTH(Event.date) LIKE 6",
                        ],
                    ],
                    "order" => "Event.date desc",
                    "limit" => $limit,
                    "page" => $pageNumJune,
                    "contain" => [
                        "EventImage" => [
                            "conditions" => [
                                "EventImage.default_image" => 1,
                            ]
                        ]
                    ]
                ]);
                $julyEvents = ClassRegistry::init("Event")->find("all", [
                    "conditions" => [
                        "AND" => [
                            $conds,
                            "MONTH(Event.date) LIKE 7",
                        ],
                    ],
                    "order" => "Event.date desc",
                    "limit" => $limit,
                    "page" => $pageNumJuly,
                    "contain" => [
                        "EventImage" => [
                            "conditions" => [
                                "EventImage.default_image" => 1,
                            ]
                        ]
                    ]
                ]);
                $augustEvents = ClassRegistry::init("Event")->find("all", [
                    "conditions" => [
                        "AND" => [
                            $conds,
                            "MONTH(Event.date) LIKE 8",
                        ],
                    ],
                    "order" => "Event.date desc",
                    "limit" => $limit,
                    "page" => $pageNumAugust,
                    "contain" => [
                        "EventImage" => [
                            "conditions" => [
                                "EventImage.default_image" => 1,
                            ]
                        ]
                    ]
                ]);
                $septEvents = ClassRegistry::init("Event")->find("all", [
                    "conditions" => [
                        "AND" => [
                            $conds,
                            "MONTH(Event.date) LIKE 9",
                        ],
                    ],
                    "order" => "Event.date desc",
                    "limit" => $limit,
                    "page" => $pageNumSept,
                    "contain" => [
                        "EventImage" => [
                            "conditions" => [
                                "EventImage.default_image" => 1,
                            ]
                        ]
                    ]
                ]);
                $oktoEvents = ClassRegistry::init("Event")->find("all", [
                    "conditions" => [
                        "AND" => [
                            $conds,
                            "MONTH(Event.date) LIKE 10",
                        ],
                    ],
                    "order" => "Event.date desc",
                    "limit" => $limit,
                    "page" => $pageNumOkto,
                    "contain" => [
                        "EventImage" => [
                            "conditions" => [
                                "EventImage.default_image" => 1,
                            ]
                        ]
                    ]
                ]);
                $novEvents = ClassRegistry::init("Event")->find("all", [
                    "conditions" => [
                        "AND" => [
                            $conds,
                            "MONTH(Event.date) LIKE 11",
                        ],
                    ],
                    "order" => "Event.date desc",
                    "limit" => $limit,
                    "page" => $pageNumNov,
                    "contain" => [
                        "EventImage" => [
                            "conditions" => [
                                "EventImage.default_image" => 1,
                            ]
                        ]
                    ]
                ]);
                $decEvents = ClassRegistry::init("Event")->find("all", [
                    "conditions" => [
                        "AND" => [
                            $conds,
                            "MONTH(Event.date) LIKE 12",
                        ],
                    ],
                    "order" => "Event.date desc",
                    "limit" => $limit,
                    "page" => $pageNumDec,
                    "contain" => [
                        "EventImage" => [
                            "conditions" => [
                                "EventImage.default_image" => 1,
                            ]
                        ]
                    ]
                ]);
                $paginationInfoJanEvent = $this->_paginationInfoMonthlyEvent($conds, $pageNumJan, $limit, $sort, 1);
                $paginationInfoFebEvent = $this->_paginationInfoMonthlyEvent($conds, $pageNumFeb, $limit, $sort, 2);
                $paginationInfoMarchEvent = $this->_paginationInfoMonthlyEvent($conds, $pageNumMar, $limit, $sort, 3);
                $paginationInfoAprilEvent = $this->_paginationInfoMonthlyEvent($conds, $pageNumApril, $limit, $sort, 4);
                $paginationInfoMayEvent = $this->_paginationInfoMonthlyEvent($conds, $pageNumMay, $limit, $sort, 5);
                $paginationInfoJuneEvent = $this->_paginationInfoMonthlyEvent($conds, $pageNumJune, $limit, $sort, 6);
                $paginationInfoJulyEvent = $this->_paginationInfoMonthlyEvent($conds, $pageNumJuly, $limit, $sort, 7);
                $paginationInfoAugustEvent = $this->_paginationInfoMonthlyEvent($conds, $pageNumAugust, $limit, $sort, 8);
                $paginationInfoSeptEvent = $this->_paginationInfoMonthlyEvent($conds, $pageNumSept, $limit, $sort, 9);
                $paginationInfoOktoEvent = $this->_paginationInfoMonthlyEvent($conds, $pageNumOkto, $limit, $sort, 10);
                $paginationInfoNovEvent = $this->_paginationInfoMonthlyEvent($conds, $pageNumNov, $limit, $sort, 11);
                $paginationInfoDecEvent = $this->_paginationInfoMonthlyEvent($conds, $pageNumDec, $limit, $sort, 12);
                $this->set(compact("paginationInfoJanEvent","paginationInfoFebEvent","paginationInfoMarchEvent","paginationInfoAprilEvent","paginationInfoMayEvent","paginationInfoJuneEvent"));
                $this->set(compact("paginationInfoJulyEvent","paginationInfoAugustEvent","paginationInfoSeptEvent","paginationInfoOktoEvent","paginationInfoNovEvent","paginationInfoDecEvent"));
                $this->set(compact("janEvents", "febEvents", "marchEvents", "aprilEvents", "mayEvents", "juneEvents"));
                $this->set(compact("julyEvents", "augustEvents", "septEvents", "oktoEvents", "novEvents", "decEvents"));
                break;
            case "event_search" :
                $searchResult = [];
                if (isset($this->request->query["term"]) && !empty($this->request->query["term"])) {
                    if (isset($this->request->query['page']) && !empty($this->request->query['page'])) {
                        $pageNum = $this->request->query['page'];
                    } else {
                        $pageNum = 1;
                    }
                    if (isset($this->request->query['limit']) && !empty($this->request->query['limit'])) {
                        $limit = $this->request->query['limit'];
                    } else {
                        $limit = 10;
                    }
                    $terms = [$this->request->query["term"]];
                    $terms = am($terms, explode(" ", $this->request->query["term"]));
                    $spTerms = function($term) {
                        return "%$term%";
                    };
                    $terms = array_map($spTerms, $terms);
                    $conds = [];
                    foreach ($terms as $term) {
                        $conds[] = "Event.title_ind like '$term'";
                    }
                    $searchResult = ClassRegistry::init("Event")->find("all", [
                        "conditions" => [
                            "OR" => $conds
                        ],
                        "order" => "Event.date desc",
                        "limit" => $limit,
                        "page" => $pageNum,
                        "contain" => [
                            "EventImage" => [
                                "conditions" => [
                                    "EventImage.default_image" => 1,
                                ]
                            ]
                        ]
                    ]);
                    $paginationInfo = $this->_paginationInfoEvent($conds, $pageNum, $limit);
                }
                $this->set(compact("searchResult", "terms"));
                $this->set(compact("paginationInfo"));
                break;
            case "reset_password" :
                $token = $path[0];
                $data = ClassRegistry::init("PasswordReset")->find("first", [
                    "conditions" => [
                        "PasswordReset.token" => $token,
                    ],
                    "contain" => [
                        "Account" => [
                            "User",
                        ]
                    ]
                ]);
                $now = new DateTime();
                if (is_null($token) || empty($data) || $data['PasswordReset']['is_used'] || $now > new DateTime($data['PasswordReset']['expire'])) {
                    $this->Session->setFlash(__(""), 'default', array(), 'reset-password-gagal');
                    $this->redirect("/login-register");
                }
                if ($this->request->is("post")) {
                    $current_password = $this->data['User']['password'];
                    $repeat_password = $this->data['User']['repeat_password'];
                    if ($current_password != $repeat_password) {
                        $this->Session->setFlash(__(""), 'default', array(), 'reset-password-email-tidak-sama');
                        $this->redirect("/reset-password");
                    }
                    $this->loadModel("Account");
                    $this->Account->data = $this->data;
                    if ($this->Account->saveAll($this->Account->data, array('validate' => 'only'))) {
                        $password = $current_password;
                        $salt = $data['Account']['User']['salt'];
                        $encrypt = $this->_hashPassword($password . $salt);
                        $this->Account->data["Account"]["id"] = $data['Account']['id'];
                        $this->Account->data["User"]["id"] = $data['Account']['User']['id'];
                        $this->Account->data["PasswordReset"]["id"] = $data['PasswordReset']['id'];
                        $this->Account->data["User"]["password"] = $encrypt;
                        $this->Account->data["PasswordReset"]["is_used"] = true;
                        unset($this->Account->data["User"]["repeat_password"]);
                        $this->Account->saveAll($this->Account->data, array("deep" => true));
                        $this->Session->setFlash(__(""), 'default', array(), 'reset-password-sukses');
                        $this->redirect("/login-register");
                    } else {
                        $this->Session->setFlash(__(""), 'default', array(), 'reset-password-gagal');
                    }
                }
                break;
            case "newsletter" :
                $userId = $path[0];
                $beritaTerkini = ClassRegistry::init("News")->find("all", [
                    "conditions" => [
                        "News.news_status_id" => 3,
                        "News.is_deleted" => 0,
                    ],
                    "order" => "News.news_date desc",
                    "limit" => 6,
                ]);
                $videoTerkini = ClassRegistry::init("News")->find("all", [
                    "conditions" => [
                        "News.news_type_id" => 3,
                        "News.news_status_id" => 3,
                        "News.is_deleted" => 0,
                    ],
                    "order" => "News.news_date desc",
                    "limit" => 2,
                ]);
                $eventTerkini = ClassRegistry::init("Event")->find("all", [
                    "order" => "Event.created desc",
                    "limit" => 2,
                    "contain" => [
                        "EventImage" => [
                            "conditions" => [
                                "EventImage.default_image" => 1,
                            ]
                        ]
                    ]
                ]);
                $this->set(compact("beritaTerkini", "videoTerkini", "eventTerkini", "userId"));
                break;
            case "recent_news" :
                if (isset($this->request->query['page']) && !empty($this->request->query['page'])) {
                    $pageNum = $this->request->query['page'];
                } else {
                    $pageNum = 1;
                }
                if (isset($this->request->query['limit']) && !empty($this->request->query['limit'])) {
                    $limit = $this->request->query['limit'];
                } else {
                    $limit = 10;
                }
                $conds[] = "News.news_status_id = 3";
                $order = "News.news_date desc";
                $beritaTerkini = ClassRegistry::init("News")->find("all", [
                    "conditions" => [
                        "News.is_deleted" => 0,
                        $conds,
                    ],
                    "order" => $order,
                    "limit" => $limit,
                    "page" => $pageNum,
                ]);                
                $paginationInfo = $this->_paginationInfo($conds, $pageNum, $limit, $order);
                $this->set(compact("paginationInfo", "beritaTerkini"));
                break;
            case "popular_news" :
                if (isset($this->request->query['page']) && !empty($this->request->query['page'])) {
                    $pageNum = $this->request->query['page'];
                } else {
                    $pageNum = 1;
                }
                if (isset($this->request->query['limit']) && !empty($this->request->query['limit'])) {
                    $limit = $this->request->query['limit'];
                } else {
                    $limit = 10;
                }
                $conds[] = "News.news_status_id = 3";
                $beritaPopuler = ClassRegistry::init("News")->find("all", [
                    "conditions" => [
                        "News.is_deleted" => 0,
                        $conds,
                    ],
                    "order" => "News.popular_rate desc",
                    "limit" => $limit,
                ]);
                $order = "News.popular_rate desc";
                $paginationInfo = $this->_paginationInfo($conds, $pageNum, $limit, $order);
                $this->set(compact("paginationInfo", "beritaPopuler"));
                break;
            case "recommended_news" :
                if (isset($this->request->query['page']) && !empty($this->request->query['page'])) {
                    $pageNum = $this->request->query['page'];
                } else {
                    $pageNum = 1;
                }
                if (isset($this->request->query['limit']) && !empty($this->request->query['limit'])) {
                    $limit = $this->request->query['limit'];
                } else {
                    $limit = 10;
                }
                $conds[] = ["News.news_status_id = 3", "News.is_recommended = 1"];
                $beritaRekomendasi = ClassRegistry::init("News")->find("all", [
                    "conditions" => [
                        "News.is_deleted" => 0,
                        $conds,
                    ],
                    "order" => "News.news_date desc",
                    "limit" => $limit,
                ]);
                $order = "News.news_date desc";
                $paginationInfo = $this->_paginationInfo($conds, $pageNum, $limit, $order);
                $this->set(compact("paginationInfo", "beritaRekomendasi"));
                break;
            case "popular_photo" :
                if (isset($this->request->query['page']) && !empty($this->request->query['page'])) {
                    $pageNum = $this->request->query['page'];
                } else {
                    $pageNum = 1;
                }
                if (isset($this->request->query['limit']) && !empty($this->request->query['limit'])) {
                    $limit = $this->request->query['limit'];
                } else {
                    $limit = 10;
                }
                $conds[] = ["News.news_status_id = 3", "News.news_type_id = 2"];
                $fotoPopuler = ClassRegistry::init("News")->find("all", [
                    "conditions" => [
                        "News.is_deleted" => 0,
                        $conds,
                    ],
                    "order" => "News.popular_rate desc",
                    "limit" => $limit,
                ]);
                $order = "News.popular_rate desc";
                $paginationInfo = $this->_paginationInfo($conds, $pageNum, $limit, $order);
                $this->set(compact("paginationInfo", "fotoPopuler"));
                break;
            case "popular_video" :
                if (isset($this->request->query['page']) && !empty($this->request->query['page'])) {
                    $pageNum = $this->request->query['page'];
                } else {
                    $pageNum = 1;
                }
                if (isset($this->request->query['limit']) && !empty($this->request->query['limit'])) {
                    $limit = $this->request->query['limit'];
                } else {
                    $limit = 10;
                }
                $conds[] = ["News.news_status_id = 3", "News.news_type_id = 3"];
                $videoPopuler = ClassRegistry::init("News")->find("all", [
                    "conditions" => [
                        "News.is_deleted" => 0,
                        $conds,
                    ],
                    "order" => "News.popular_rate desc",
                    "limit" => $limit,
                ]);
                $order = "News.popular_rate desc";
                $paginationInfo = $this->_paginationInfo($conds, $pageNum, $limit, $order);
                $this->set(compact("paginationInfo", "videoPopuler"));
                break;
            case "recent_event" :
                if (isset($this->request->query['page']) && !empty($this->request->query['page'])) {
                    $pageNum = $this->request->query['page'];
                } else {
                    $pageNum = 1;
                }
                if (isset($this->request->query['limit']) && !empty($this->request->query['limit'])) {
                    $limit = $this->request->query['limit'];
                } else {
                    $limit = 10;
                }
                $conds[] = "";
                $eventTerkini = ClassRegistry::init("Event")->find("all",[
                    "conditions" => [
                        $conds,
                    ],
                    "order" => "Event.created desc",
                    "limit" => $limit,
                    "contain" => [
                            "EventImage" => [
                                "conditions" => [
                                    "EventImage.default_image" => 1,
                                ]
                            ]
                        ]
                ]);
                $order = "Event.created desc";
                $paginationInfo = $this->_paginationInfoEvent($conds, $pageNum, $limit, $order);
                $this->set(compact("paginationInfo", "eventTerkini"));
                break;
            case "all_citizen_report" :
                if (isset($this->request->query['page']) && !empty($this->request->query['page'])) {
                    $pageNum = $this->request->query['page'];
                } else {
                    $pageNum = 1;
                }
                if (isset($this->request->query['limit']) && !empty($this->request->query['limit'])) {
                    $limit = $this->request->query['limit'];
                } else {
                    $limit = 10;
                }
                $conds[] = ["News.news_status_id = 3", "News.is_citizen_report = 1"];
                $citizenReport = ClassRegistry::init("News")->find("all",[
                    "conditions" => [
                        "News.is_deleted" => 0,
                        $conds,
                    ],
                    "order" => "News.news_date desc",
                    "limit" => $limit,
                ]);
                $order = "News.news_date desc";                
                $paginationInfo = $this->_paginationInfo($conds, $pageNum, $limit, $order);
                $this->set(compact("paginationInfo", "citizenReport"));
                break;
            case "all_news_category" :
                if (isset($this->request->query['page']) && !empty($this->request->query['page'])) {
                    $pageNum = $this->request->query['page'];
                } else {
                    $pageNum = 1;
                }
                if (isset($this->request->query['limit']) && !empty($this->request->query['limit'])) {
                    $limit = $this->request->query['limit'];
                } else {
                    $limit = 10;
                }
                $conds[] = ["News.news_status_id = 3"];
                $allNewsCategory = ClassRegistry::init("News")->find("all",[
                    "conditions" => [
                        "News.is_deleted" => 0,
                        $conds,
                    ],
                    "order" => "News.news_date desc",
                    "limit" => $limit,
                ]);
                $order = "News.news_date desc";                
                $paginationInfo = $this->_paginationInfo($conds, $pageNum, $limit, $order);
                $this->set(compact("paginationInfo", "allNewsCategory"));
                break;
            case "semua_kategori" :
                $category_type = $path[0];
                $order = "News.news_date desc";
                if (isset($this->request->query['page']) && !empty($this->request->query['page'])) {
                    $pageNum = $this->request->query['page'];
                } else {
                    $pageNum = 1;
                }
                if (isset($this->request->query['limit']) && !empty($this->request->query['limit'])) {
                    $limit = $this->request->query['limit'];
                } else {
                    $limit = 10;
                }
                $linkedCategories = $this->_getAllLinkedCategory($path[0]);
                $conds = [
                    "NewsCategory.uniq" => $linkedCategories,
                    "News.is_citizen_report" => 0,
                    "News.news_status_id" => 3,
                    "News.is_deleted" => 0,
                ];
                $allNews = $this->_allNews($conds, $pageNum, $limit, $order);
                $paginationInfo = $this->_paginationInfo($conds, $pageNum, $limit);
                $this->set("currentNews", $allNews);
                $this->set("currentNewsFilter", ["page" => $pageNum, "limit" => $limit, "category" => $linkedCategories]);
                if (($key = array_search($path[0], $linkedCategories)) !== false) {
                    unset($linkedCategories[$key]);
                }
                $childCategories = [];
                $parentCategories = [];
                foreach ($linkedCategories as $linkedCategory) {
                    $d = ClassRegistry::init("NewsCategory")->find("first", [
                        "conditions" => [
                            "NewsCategory.uniq" => $linkedCategory,
                        ]
                    ]);

                    $childCategories[] = $d;
                }
                $parent = ClassRegistry::init("NewsCategory")->find("first", [
                    "conditions" => [
                        "NewsCategory.uniq" => $path[0],
                    ]
                ]);
                $parentCategories[] = $parent;
                $this->set("childCategories", $childCategories);
                $this->set("parentCategories", $parentCategories);
                $this->set("categoryType", $category_type);
                $this->set("paginationInfo", $paginationInfo);
                break;  
            case "kontak":
                $emailCompany = ClassRegistry::init("CompanyProfile")->find("first", []);
                if ($this->request->is("post")) {
                    if (!empty($this->data['g-recaptcha-response'])) {
                        $nama = $this->data['nama'];
                        $email = $this->data['email'];
                        $judul = $this->data['judul'];
                        $isi = $this->data['isi'];
                        $emailTo = $emailCompany['CompanyProfile']['email'];
                        $success = true;
                        try {            
                            $this->_sentEmail("contact-us", [
                                "tujuan" => $emailTo,
                                "subject" => $judul,
                                "from" => $email,
                                "acc" => "NoReply2",
                                "item" => [
                                    "isiPesan" => $isi,
                                    "nama" => $nama,
                                    "email" => $email,
                                ],
                            ]);
                        } catch (Exception $e) {
                            $success = false;
                            $this->Session->setFlash(__(""), 'default', array(), 'contact-us-gagal');
                        }
                        if ($success == true) {
                            $this->Session->setFlash(__(""), 'default', array(), 'contact-us-sukses');
                        }
                        $this->redirect('/kontak');
                    } else {
                        
                    }
                }
                break;
            case "gallery_photo" :
                $recentPhotoNews = ClassRegistry::init("News")->find("all",[
                    "conditions" => [
                        "News.news_type_id" => 2,
                        "News.news_status_id" => 3,
                        "News.is_deleted" => 0,
                    ],
                    "order" => "News.news_date desc",
                    "limit" => 6,
                ]);
                $recommendedPhotoNews = ClassRegistry::init("News")->find("all",[
                    "conditions" => [
                        "News.news_type_id" => 2,
                        "News.news_status_id" => 3,
                        "News.is_recommended" => 1,
                        "News.is_deleted" => 0,
                    ],
                    "order" => "News.news_date desc",
                    "limit" => 12,
                ]);
                $slideshowPhotoNews = ClassRegistry::init("GallerySlideshow")->find("all",[
                    "conditions" => [
                        "GallerySlideshow.showing_status_id" => 1,
                        "GallerySlideshow.slideshow_type_id" => 1,
                    ],
                    "contain" => [
                        "GallerySlideshowDetail" => [
                            "order" => "GallerySlideshowDetail.is_primary desc",
                            "News" => [
                                "NewsCategory",
                                "NewsImage"
                            ],
                        ],
                    ],
                ]);
                $this->set(compact("recentPhotoNews", "recommendedPhotoNews", "slideshowPhotoNews"));
                break;
            case "gallery_video" :
                $recentVideoNews = ClassRegistry::init("News")->find("all",[
                    "conditions" => [
                        "News.news_type_id" => 3,
                        "News.news_status_id" => 3,
                        "News.is_deleted" => 0,
                    ],
                    "order" => "News.news_date desc",
                    "limit" => 6,
                ]);
                $recommendedVideoNews = ClassRegistry::init("News")->find("all",[
                    "conditions" => [
                        "News.news_type_id" => 3,
                        "News.news_status_id" => 3,
                        "News.is_recommended" => 1,
                        "News.is_deleted" => 0,
                    ],
                    "order" => "News.news_date desc",
                    "limit" => 12,
                ]);
                $slideshowVideoNews = ClassRegistry::init("GalleryVideoSlideshow")->find("all",[
                    "conditions" => [
                        "GalleryVideoSlideshow.showing_status_id" => 1,
                        "GalleryVideoSlideshow.slideshow_type_id" => 1,
                    ],
                    "contain" => [
                        "GalleryVideoSlideshowDetail" => [
                            "order" => "GalleryVideoSlideshowDetail.is_primary desc",
                            "News" => [
                                "NewsCategory",
                            ]
                        ]
                    ]
                ]);
                $this->set(compact("recentVideoNews", "recommendedVideoNews", "slideshowVideoNews"));
                break;
            case "semua_galeri_foto" :
                $order = "News.news_date desc";
                if (isset($this->request->query['page']) && !empty($this->request->query['page'])) {
                    $pageNum = $this->request->query['page'];
                } else {
                    $pageNum = 1;
                }
                if (isset($this->request->query['limit']) && !empty($this->request->query['limit'])) {
                    $limit = $this->request->query['limit'];
                } else {
                    $limit = 10;
                }
                $linkedCategories = $this->_getAllLinkedCategory("foto");
                $conds = [
                    "OR" => [
                        "NewsCategory.uniq" => $linkedCategories,
                        "News.news_type_id" => 2,
                    ],
                    "News.is_citizen_report" => 0,
                    "News.news_status_id" => 3,
                    "News.is_deleted" => 0,
                ];
                $allNews = $this->_allNews($conds, $pageNum, $limit, $order);
                $paginationInfo = $this->_paginationInfo($conds, $pageNum, $limit);
                $this->set("currentNews", $allNews);
                $this->set("currentNewsFilter", ["page" => $pageNum, "limit" => $limit, "category" => $linkedCategories]);
                if (($key = array_search("foto", $linkedCategories)) !== false) {
                    unset($linkedCategories[$key]);
                }
                $childCategories = [];
                $parentCategories = [];
                foreach ($linkedCategories as $linkedCategory) {
                    $d = ClassRegistry::init("NewsCategory")->find("first", [
                        "conditions" => [
                            "NewsCategory.uniq" => $linkedCategory,
                        ]
                    ]);

                    $childCategories[] = $d;
                }
                $parent = ClassRegistry::init("NewsCategory")->find("first", [
                    "conditions" => [
                        "NewsCategory.uniq" => "foto",
                    ]
                ]);
                $parentCategories[] = $parent;
                $this->set("childCategories", $childCategories);
                $this->set("parentCategories", $parentCategories);
                $this->set("paginationInfo", $paginationInfo);
                break;
            case "semua_galeri_video" :
                $order = "News.news_date desc";
                if (isset($this->request->query['page']) && !empty($this->request->query['page'])) {
                    $pageNum = $this->request->query['page'];
                } else {
                    $pageNum = 1;
                }
                if (isset($this->request->query['limit']) && !empty($this->request->query['limit'])) {
                    $limit = $this->request->query['limit'];
                } else {
                    $limit = 10;
                }
                $linkedCategories = $this->_getAllLinkedCategory("video");
                $conds = [
                    "OR" => [
                        "NewsCategory.uniq" => $linkedCategories,
                        "News.news_type_id" => 3,
                    ],
                    "News.is_citizen_report" => 0,
                    "News.news_status_id" => 3,
                    "News.is_deleted" => 0,
                ];
                $allNews = $this->_allNews($conds, $pageNum, $limit, $order);
                $paginationInfo = $this->_paginationInfo($conds, $pageNum, $limit);
                $this->set("currentNews", $allNews);
                $this->set("currentNewsFilter", ["page" => $pageNum, "limit" => $limit, "category" => $linkedCategories]);
                if (($key = array_search("video", $linkedCategories)) !== false) {
                    unset($linkedCategories[$key]);
                }
                $childCategories = [];
                $parentCategories = [];
                foreach ($linkedCategories as $linkedCategory) {
                    $d = ClassRegistry::init("NewsCategory")->find("first", [
                        "conditions" => [
                            "NewsCategory.uniq" => $linkedCategory,
                        ]
                    ]);

                    $childCategories[] = $d;
                }
                $parent = ClassRegistry::init("NewsCategory")->find("first", [
                    "conditions" => [
                        "NewsCategory.uniq" => "video",
                    ]
                ]);
                $parentCategories[] = $parent;
                $this->set("childCategories", $childCategories);
                $this->set("parentCategories", $parentCategories);
                $this->set("paginationInfo", $paginationInfo);
                break;           
        }
        $this->_setRecentNews();
        $this->_setAllCategories();
        $this->_setPopularNews();
        try {
            $this->render($this->frontTemplate . '/' . $page);
        } catch (MissingViewException $e) {
            if (Configure::read('debug')) {
                throw $e;
            }
            throw new NotFoundException();
        }
    }

    function _subProduct($parent) {
        $category = ClassRegistry::init("NewsCategory")->findById($parent);
        $allProduct = ClassRegistry::init("News")->find("all", array("conditions" => array("News.news_category_id" => $parent, "News.news_status_id" => 1), "order" => "News.news_date desc"));
        foreach ($category['Child'] as $child) {
            $allProduct = am($allProduct, $this->_subProduct($child['id']));
        }
        return $allProduct;
    }

    function _allNews($conds = array(), $page = 1, $limit = 10, $sort = "") {
        $order = "News.news_date desc";
        $allNews = ClassRegistry::init("News")->find("all", array(
            "conditions" => array(
                "AND" => array(
                    "News.news_status_id" => 3, // has been published
                    "News.is_deleted" => 0,
                    $conds
                )
            ),
            "order" => $order,
            "page" => $page,
            "limit" => $limit,
        ));
        return $allNews;
    }

    function _getAllLinkedCategory($parent) {
        $linkedCategory = [$parent];
        $category = ClassRegistry::init("NewsCategory")->find("first", [
            "conditions" => [
                "NewsCategory.uniq" => $parent,
            ]
        ]);
        foreach ($category['Child'] as $child) {
            $linkedCategory = am($linkedCategory, $this->_getAllLinkedCategory($child['uniq']));
        }
        return $linkedCategory;
    }

    function _paginationInfo($conds, $page = 1, $limit = 2, $sort = "", $order = "News.news_date desc") {
        $info = [];
        $data = ClassRegistry::init("News")->find("count", array(
            "conditions" => array(
                "and" => array(
                    "News.News_status_id" => 3,
                    "News.is_deleted" => 0,
                    $conds,
                )
            ),
            "order" => $order,
        ));
        $info['totalItem'] = $data;
        $info['totalPage'] = ceil($data / $limit);
        $info['currentPage'] = $page;
        $info['limit'] = $limit;
        $info['startItem'] = ($page - 1) * $limit + 1;
        $info['endItem'] = $info['startItem'] + $limit - 1;
        if ($info['endItem'] > $info['totalItem']) {
            $info['endItem'] = $info['totalItem'];
        }
        return $info;
    }

    function _paginationInfoEvent($conds, $page = 1, $limit = 2, $sort = "") {
        $info = [];
        $data = ClassRegistry::init("Event")->find("count", array(
            "conditions" => array(
                "and" => array(
                    "Event.event_status_id" => 1,
                    $conds,
                )
            ),
            "order" => "Event.created desc",
        ));
        $info['totalItem'] = $data;
        $info['totalPage'] = ceil($data / $limit);
        $info['currentPage'] = $page;
        $info['limit'] = $limit;
        $info['startItem'] = ($page - 1) * $limit + 1;
        $info['endItem'] = $info['startItem'] + $limit - 1;
        if ($info['endItem'] > $info['totalItem']) {
            $info['endItem'] = $info['totalItem'];
        }
        return $info;
    }
    
    function _paginationInfoMonthlyEvent($conds, $page = 1, $limit = 2, $sort = "", $month) {
        $info = [];
        $conds[] = "MONTH(Event.date) LIKE $month";
        $data = ClassRegistry::init("Event")->find("count", array(
            "conditions" => array(
                "and" => array(
                    "Event.event_status_id" => 1,
                    $conds,
                )
            ),
            "order" => "Event.created desc",
        ));
        $info['totalItem'] = $data;
        $info['totalPage'] = ceil($data / $limit);
        $info['currentPage'] = $page;
        $info['limit'] = $limit;
        $info['startItem'] = ($page - 1) * $limit + 1;
        $info['endItem'] = $info['startItem'] + $limit - 1;
        if ($info['endItem'] > $info['totalItem']) {
            $info['endItem'] = $info['totalItem'];
        }
        return $info;
    }

    function _setRecentNews() {
        $recentNews = ClassRegistry::init("News")->find("all", [            
            "conditions" => [
                "News.news_status_id" => 3,
                "News.is_deleted" => 0,
            ],
            "limit" => 10,
            "order" => "News.news_date desc",
        ]);
        $this->set(compact("recentNews"));
    }

    function _setAllCategories() {
        $allCategories = ClassRegistry::init("NewsCategory")->find("all");
        $this->set(compact("allCategories"));
    }

    function _setPopularNews() {
        $news_popular = ClassRegistry::init("News")->find("all", [
            "conditions" => [
                "News.news_status_id" => 3,
                "News.is_deleted" => 0,
            ],
            "order" => "News.popular_rate desc",
            "limit" => 10,
        ]);

        $this->set("newsPopulars", $news_popular);
    }

    function ajax_news() {
        $this->autoRender = false;
        $this->response->type("json");
        if (isset($this->request->query["limit"]) && !empty($this->request->query["limit"])) {
            $limit = $this->request->query["limit"];
        } else {
            $limit = 3;
        }
        if (isset($this->request->query["order"]) && !empty($this->request->query["order"])) {
            $order = $this->request->query["order"];
        } else {
            $order = "News.news_date desc";
        }
        if (isset($this->request->query["page"]) && !empty($this->request->query["page"])) {
            $page = $this->request->query["page"];
        } else {
            $page = 1;
        }
        $conds = [];
        if (isset($this->request->query["category"]) && !empty($this->request->query["category"])) {
            $conds["NewsCategory.uniq"] = explode(",", $this->request->query["category"]);
        }
        if (isset($this->request->query["citizen_report"]) && !empty($this->request->query["citizen_report"])) {
            if ($this->request->query["citizen_report"] == 1) {
                $conds["News.is_citizen_report"] = true;
            } else {
                $conds["News.is_citizen_report"] = false;
            }
        }

        if (isset($this->request->query["status_id"]) && !empty($this->request->query["status_id"])) {

            $conds["News.news_status_id"] = $this->request->query["status_id"];
        }
        if (isset($this->request->query["term"]) && !empty($this->request->query["term"])) {
            $terms = [];
            $terms = [$this->request->query["term"]];
            $terms = am($terms, explode(" ", $this->request->query["term"]));
            $spTerms = function($term) {
                return "%$term%";
            };
            $terms = array_map($spTerms, $terms);
            foreach ($terms as $term) {
                $conds[] = "News.title_ind like '$term'";
            }
        }
        if (isset($this->request->query['tab2'])) {
            $order[] = "News.popular_rate desc";
        }
        if (isset($this->request->query['tab3'])) {
            $order[] = "News.popular_rate desc";
            $conds[] = "News.is_recommended like 1";
        }
        $filter = [
            "page" => $page,
            "order" => $order,
            "limit" => $limit,
            "conditions" => [
                "News.is_deleted" => 0,
                $conds
            ],
            "contain" => [
                "Author" => [
                    "Biodata"
                ],
                "NewsImage",
                "NewsCategory"
            ],
        ];
        $news = ClassRegistry::init("News")->find("all", $filter);
        $count = ClassRegistry::init("News")->find("count", ["conditions" => $conds]);
        $info = [];
        $info['totalItem'] = $count;
        $info['totalPage'] = ceil($count / $limit);
        $info['currentPage'] = $page;
        $info['limit'] = $limit;
        $info['startItem'] = ($page - 1) * $limit + 1;
        $info['endItem'] = $info['startItem'] + $limit - 1;
        if ($info['endItem'] > $info['totalItem']) {
            $info['endItem'] = $info['totalItem'];
        }
        echo json_encode($this->_generateStatusCode(206, null, ["items" => $news, "pagination_info" => $info, "filter" => $filter]));
    }

    function ajax_event() {
        $this->autoRender = false;
        if (isset($this->request->query["limit"]) && !empty($this->request->query["limit"])) {
            $limit = $this->request->query["limit"];
        } else {
            $limit = 3;
        }
        if (isset($this->request->query["order"]) && !empty($this->request->query["order"])) {
            $order = $this->request->query["order"];
        } else {
            $order = "Event.created desc";
        }
        if (isset($this->request->query["page"]) && !empty($this->request->query["page"])) {
            $page = $this->request->query["page"];
        } else {
            $page = 1;
        }
        $conds = [];
        $filter = [
            "page" => $page,
            "order" => $order,
            "limit" => $limit,
            "conditions" => $conds,
        ];
        $event = ClassRegistry::init("Event")->find("all", $filter);
        $count = ClassRegistry::init("Event")->find("count", ["conditions" => $conds]);
        $info = [];
        $info['totalItem'] = $count;
        $info['totalPage'] = ceil($count / $limit);
        $info['currentPage'] = $page;
        $info['limit'] = $limit;
        $info['startItem'] = ($page - 1) * $limit + 1;
        $info['endItem'] = $info['startItem'] + $limit - 1;
        if ($info['endItem'] > $info['totalItem']) {
            $info['endItem'] = $info['totalItem'];
        }
        $this->set("ajax_event", $event);
        echo json_encode($this->_generateStatusCode(206, null, ["items" => $event, "pagination_info" => $info, "filter" => $filter]));
    }
    
    function ajax_comment($newsId) {
        $this->autoRender = false;
        $this->response->type("json");
        if (isset($this->request->query["limit"]) && !empty($this->request->query["limit"])) {
            $limit = $this->request->query["limit"];
        } else {
            $limit = 2;
        }
        if (isset($this->request->query["order"]) && !empty($this->request->query["order"])) {
            $order = $this->request->query["order"];
        } else {
            $order = "NewsComment.created desc";
        }
        if (isset($this->request->query["page"]) && !empty($this->request->query["page"])) {
            $page = $this->request->query["page"];
        } else {
            $page = 1;
        }
        $conds = [];
        $conds = "NewsComment.news_id like $newsId";
        $filter = [
            "page" => $page,
            "order" => $order,
            "limit" => $limit,
            "conditions" => [
                "NewsComment.news_id" => $newsId,
            ],
            "contain" => [
                "Account" => [
                    "Biodata",
                    "User",
                ]
            ]
        ];
        $comments = ClassRegistry::init("NewsComment")->find("all", $filter);
        $count = ClassRegistry::init("NewsComment")->find("count", ["conditions" => $conds]);
        $info = [];
        $info['totalItem'] = $count;
        $info['totalPage'] = ceil($count / $limit);
        $info['currentPage'] = $page;
        $info['limit'] = $limit;
        $info['startItem'] = ($page - 1) * $limit + 1;
        $info['endItem'] = $info['startItem'] + $limit - 1;
        if ($info['endItem'] > $info['totalItem']) {
            $info['endItem'] = $info['totalItem'];
        }
        echo json_encode($this->_generateStatusCode(206, null, ["items" => $comments, "pagination_info" => $info, "filter" => $filter]));
    }

    function ajax_advert_expire() {
        $this->autoRender = false;
        if (isset($this->request->query["limit"]) && !empty($this->request->query["limit"])) {
            $limit = $this->request->query["limit"];
        } else {
            $limit = 3;
        }
        if (isset($this->request->query["order"]) && !empty($this->request->query["order"])) {
            $order = $this->request->query["order"];
        } else {
            $order = "Advert.expired_date desc";
        }
        if (isset($this->request->query["page"]) && !empty($this->request->query["page"])) {
            $page = $this->request->query["page"];
        } else {
            $page = 1;
        }

        $curr_date = date("Y-m-d");

        $conds = [
            "'$curr_date' between date_sub(Advert.expired_date, interval 7 day) and Advert.expired_date"
        ];

        $filter = [
            "page" => $page,
            "order" => $order,
            "limit" => $limit,
            "conditions" => $conds,
        ];

        $advert = ClassRegistry::init("Advert")->find("all", $filter);
        $count = ClassRegistry::init("Advert")->find("count", ["conditions" => $conds]);

        $info = [];
        $info['totalItem'] = $count;
        $info['totalPage'] = ceil($count / $limit);
        $info['currentPage'] = $page;
        $info['limit'] = $limit;
        $info['startItem'] = ($page - 1) * $limit + 1;
        $info['endItem'] = $info['startItem'] + $limit - 1;
        if ($info['endItem'] > $info['totalItem']) {
            $info['endItem'] = $info['totalItem'];
        }
        $this->set("ajax_advert_expire", $advert);
        echo json_encode($this->_generateStatusCode(206, null, ["items" => $advert, "pagination_info" => $info, "filter" => $filter]));
    }

    function count_similar($metakey1, $metakey2) {
        $count = 0;
        $key1 = explode(",", $metakey1);
        $key2 = explode(",", $metakey2);
        foreach ($key1 as $compare1) {
            foreach ($key2 as $compare2) {
                if ($compare1 == $compare2) {
                    $count++;
                }
            }
        }
        return $count;
    }
    
    function ajax_gallery_photos() {
        $this->autoRender = false;
        $this->response->type("json");
        if (isset($this->request->query["limit"]) && !empty($this->request->query["limit"])) {
            $limit = $this->request->query["limit"];
        } else {
            $limit = 3;
        }
        if (isset($this->request->query["order"]) && !empty($this->request->query["order"])) {
            $order = $this->request->query["order"];
        } else {
            $order = "News.news_date desc";
        }
        if (isset($this->request->query["page"]) && !empty($this->request->query["page"])) {
            $page = $this->request->query["page"];
        } else {
            $page = 1;
        }
        $conds = [];
        $conds[] = ["News.news_type_id like 2", "News.is_deleted like 0"];
        if (isset($this->request->query["category"]) && !empty($this->request->query["category"])) {
            $conds["NewsCategory.uniq"] = explode(",", $this->request->query["category"]);
        }
        if (isset($this->request->query["citizen_report"]) && !empty($this->request->query["citizen_report"])) {
            if ($this->request->query["citizen_report"] == 1) {
                $conds["News.is_citizen_report"] = true;
            } else {
                $conds["News.is_citizen_report"] = false;
            }
        }

        if (isset($this->request->query["status_id"]) && !empty($this->request->query["status_id"])) {

            $conds["News.news_status_id"] = $this->request->query["status_id"];
        }
        if (isset($this->request->query["term"]) && !empty($this->request->query["term"])) {
            $terms = [];
            $terms = [$this->request->query["term"]];
            $terms = am($terms, explode(" ", $this->request->query["term"]));
            $spTerms = function($term) {
                return "%$term%";
            };
            $terms = array_map($spTerms, $terms);
            foreach ($terms as $term) {
                $conds[] = "News.title_ind like '$term'";
            }
        }
        if (isset($this->request->query['tab2'])) {
            $order[] = "News.popular_rate desc";
        }
        if (isset($this->request->query['tab3'])) {
            $order[] = "News.popular_rate desc";
            $conds[] = "News.is_recommended like 1";
        }
        $filter = [
            "page" => $page,
            "order" => $order,
            "limit" => $limit,
            "conditions" => [
                "News.is_deleted" => 0,
                $conds
            ],
        ];
        $news = ClassRegistry::init("News")->find("all", $filter);
        $count = ClassRegistry::init("News")->find("count", ["conditions" => $conds]);
        $info = [];
        $info['totalItem'] = $count;
        $info['totalPage'] = ceil($count / $limit);
        $info['currentPage'] = $page;
        $info['limit'] = $limit;
        $info['startItem'] = ($page - 1) * $limit + 1;
        $info['endItem'] = $info['startItem'] + $limit - 1;
        if ($info['endItem'] > $info['totalItem']) {
            $info['endItem'] = $info['totalItem'];
        }
        echo json_encode($this->_generateStatusCode(206, null, ["items" => $news, "pagination_info" => $info, "filter" => $filter]));
    }
    
    function ajax_gallery_videos() {
        $this->autoRender = false;
        $this->response->type("json");
        if (isset($this->request->query["limit"]) && !empty($this->request->query["limit"])) {
            $limit = $this->request->query["limit"];
        } else {
            $limit = 3;
        }
        if (isset($this->request->query["order"]) && !empty($this->request->query["order"])) {
            $order = $this->request->query["order"];
        } else {
            $order = "News.news_date desc";
        }
        if (isset($this->request->query["page"]) && !empty($this->request->query["page"])) {
            $page = $this->request->query["page"];
        } else {
            $page = 1;
        }
        $conds = [];
        $conds[] = "News.news_type_id like 3";
        if (isset($this->request->query["category"]) && !empty($this->request->query["category"])) {
            $conds["NewsCategory.uniq"] = explode(",", $this->request->query["category"]);
        }
        if (isset($this->request->query["citizen_report"]) && !empty($this->request->query["citizen_report"])) {
            if ($this->request->query["citizen_report"] == 1) {
                $conds["News.is_citizen_report"] = true;
            } else {
                $conds["News.is_citizen_report"] = false;
            }
        }

        if (isset($this->request->query["status_id"]) && !empty($this->request->query["status_id"])) {

            $conds["News.news_status_id"] = $this->request->query["status_id"];
        }
        if (isset($this->request->query["term"]) && !empty($this->request->query["term"])) {
            $terms = [];
            $terms = [$this->request->query["term"]];
            $terms = am($terms, explode(" ", $this->request->query["term"]));
            $spTerms = function($term) {
                return "%$term%";
            };
            $terms = array_map($spTerms, $terms);
            foreach ($terms as $term) {
                $conds[] = "News.title_ind like '$term'";
            }
        }
        if (isset($this->request->query['tab2'])) {
            $order[] = "News.popular_rate desc";
        }
        if (isset($this->request->query['tab3'])) {
            $order[] = "News.popular_rate desc";
            $conds[] = "News.is_recommended like 1";
        }
        $filter = [
            "page" => $page,
            "order" => $order,
            "limit" => $limit,
            "conditions" => [
                "News.is_deleted" => 0,
                $conds
            ],
        ];
        $news = ClassRegistry::init("News")->find("all", $filter);
        $count = ClassRegistry::init("News")->find("count", ["conditions" => $conds]);
        $info = [];
        $info['totalItem'] = $count;
        $info['totalPage'] = ceil($count / $limit);
        $info['currentPage'] = $page;
        $info['limit'] = $limit;
        $info['startItem'] = ($page - 1) * $limit + 1;
        $info['endItem'] = $info['startItem'] + $limit - 1;
        if ($info['endItem'] > $info['totalItem']) {
            $info['endItem'] = $info['totalItem'];
        }
        echo json_encode($this->_generateStatusCode(206, null, ["items" => $news, "pagination_info" => $info, "filter" => $filter]));
    }
}