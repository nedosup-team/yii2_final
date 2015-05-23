<?php
/* @var $this yii\web\View */
/* @var $categories array */
$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="body-content">
        <a id="test_test" href="#">Test</a>

        <div class="first-step">
            <div class="row">
                <div class="small-4 small-centered columns">
                    <form action="">
                        <label>Що вас цікавить?
              <span class="row">
                <span class="small-10 columns">
                   <?= \yii\helpers\Html::dropDownList('category_id', false, $categories) ?>
                </span>
                <span class="small-2 columns">
                    <span class="submit-container">
                  <input type="submit" value="GO">
                </span>
                </span>
              </span>
                        </label>
                    </form>
                    <a href="#" class="button round">Побачити все</a>
                </div>
            </div>
        </div>



        <div class="thecond-step">
            <div class="row">

                <div class="small-8 columns small-centered">

                    <div class="row">
                        <div class="small-2 columns"><img src="http://placehold.it/80x80&amp;text=[img]"></div>
                        <div class="small-8 columns">
                            <p><strong>Some Person said:</strong> Bacon ipsum dolor sit amet nulla ham qui sint exercitation eiusmod commodo, chuck duis velit. Aute in reprehenderit, dolore aliqua non est magna in labore pig pork biltong.</p>
                        </div>
                        <div class="columns small-2">
                            <a href="" class="button round"> see</a>
                        </div>
                    </div>


                    <hr>


                    <div class="row">
                        <div class="small-2 columns"><img src="http://placehold.it/80x80&amp;text=[img]"></div>
                        <div class="small-8 columns">
                            <p><strong>Some Person said:</strong> Bacon ipsum dolor sit amet nulla ham qui sint exercitation eiusmod commodo, chuck duis velit. Aute in reprehenderit, dolore aliqua non est magna in labore pig pork biltong.</p>
                        </div>
                        <div class="columns small-2">
                            <a href="" class="button round"> see</a>
                        </div>
                    </div>

                </div>

            </div>
        </div>

        <div class="third-step">
            <div class="nav text-center">
                <div class="row">
                    <div class="small-6 small-centered columns">
                        <dl class="sub-nav" role="menu" title="Filter Menu List">
                            <dd class="active" role="menuitem"><a class="" href="#">Info</a></dd>
                            <dd role="menuitem"><a class="" href="#">News</a></dd>
                            <dd role="menuitem"><a class="" href="#">Speakers</a></dd>
                            <dd role="menuitem"><a class="" href="#">Participants</a></dd>
                        </dl>
                    </div>
                </div>
            </div>
            <div class="content">
                <div class="row">
                    <div class="small-3 columns">
                        <div class="author">
                            <img src="http://placehold.it/80x80&amp;text=[img]">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi animi hic, dignissimos ullam facere molestiae, ratione eaque maiores dolore ut neque sapiente recusandae debitis minima culpa incidunt eligendi fuga perferendis?</p>
                        </div>
                        <div class="participants">
                            <h4>Participants</h4>
                            <div class="row">
                                <div class="small-4 columns"><img src="http://placehold.it/80x80&amp;text=[img]"></div>
                                <div class="small-4 columns"><img src="http://placehold.it/80x80&amp;text=[img]"></div>
                                <div class="small-4 columns"><img src="http://placehold.it/80x80&amp;text=[img]"></div>
                                <div class="small-4 columns"><img src="http://placehold.it/80x80&amp;text=[img]"></div>
                                <div class="small-4 columns"><img src="http://placehold.it/80x80&amp;text=[img]"></div>
                                <div class="small-4 columns"><img src="http://placehold.it/80x80&amp;text=[img]"></div>
                            </div>
                        </div>

                    </div>
                    <div class="small-6 columns">
                        <div class="description">
                            <h1>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum sit eaque voluptates hic doloribus iste! Expedita fugiat, cumque nobis voluptatum est quam sapiente sed qui laudantium, obcaecati a! Vel, distinctio.</h1>
                            <h2>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas quaerat laboriosam illo culpa, facere architecto praesentium? Quisquam rem quo a veniam modi aperiam eius accusamus quasi asperiores dolores, repudiandae beatae!</h2>
                            <h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius optio minus nostrum cumque deleniti incidunt qui dignissimos magnam. Fugit autem voluptates nobis suscipit sequi quisquam, repudiandae repellendus cupiditate soluta iste!</h3>
                            <h4>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem doloremque ut at sapiente saepe cumque reiciendis nostrum, possimus assumenda. Veritatis facilis dicta tempora distinctio, harum corporis exercitationem reiciendis atque iusto.</h4>
                            <h5>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repudiandae maxime tempore dolorum rem, hic modi earum corrupti vitae dolorem quam? Odio sint in nemo, vitae quisquam commodi quos ipsum doloribus.</h5>
                            <h6>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex nisi voluptate sint error corporis odit quo aperiam reiciendis at, impedit asperiores quod praesentium laboriosam a explicabo itaque. Dolor, cum, veniam.</h6>
                            <ul>
                                <li>item1</li>
                                <li>item2</li>
                                <li>item3</li>
                            </ul>
                            <ol>
                                <li>item1</li>
                                <li>item2</li>
                                <li>item3</li>
                            </ol>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo molestias, veniam commodi repellendus incidunt ea laudantium laboriosam consequatur assumenda reiciendis ullam dolores animi voluptatibus impedit, quae voluptatum vitae quaerat. Cumque.</p>
                            <blockquote>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati quam, aperiam minus veniam facere beatae, officia excepturi ipsa itaque nesciunt reprehenderit architecto sit commodi unde doloremque numquam sunt ad sint.</blockquote>
                        </div>
                        <div class="comments">
                            <h6>2 Comments</h6>
                            <div class="row">
                                <div class="small-2 columns"><img src="http://placehold.it/50x50&amp;text=[img]"></div>
                                <div class="small-10 columns"><p>Bacon ipsum dolor sit amet nulla ham qui sint exercitation eiusmod commodo, chuck duis velit. Aute in reprehenderit</p></div>
                            </div>
                            <div class="row">
                                <div class="small-2 columns"><img src="http://placehold.it/50x50&amp;text=[img]"></div>
                                <div class="small-10 columns"><p>Bacon ipsum dolor sit amet nulla ham qui sint exercitation eiusmod commodo, chuck duis velit. Aute in reprehenderit</p></div>
                            </div>
                        </div>
                    </div>
                    <div class="small-3 columns">
                        <div class="socials">
                            <div class="icon-bar three-up">
                                <a class="item">
                                    <i class="fi-facebook"></i>
                                </a>
                                <a class="item">
                                    <i class="fi-twitter"></i>
                                </a>
                                <a class="item">
                                    <i class="fi-google"></i>
                                </a>
                            </div>

                        </div>

                        <div class="map">
                            <img src="http://placehold.it/300x300&amp;text=[img]">
                        </div>

                        <div class="news">
                            <div class="row small-collapse">
                                <div class="small-2 columns"><img src="http://placehold.it/40x40&amp;text=[img]"></div>
                                <div class="small-10 columns">
                                    <p><strong>Some Person said:</strong> Bacon ipsum dolor sit amet nulla ham qui sint exercitation eiusmod commodo, chuck duis velit. Aute in reprehenderit, dolore aliqua non est magna in labore pig pork biltong.</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="small-2 columns"><img src="http://placehold.it/40x40&amp;text=[img]"></div>
                                <div class="small-10 columns">
                                    <p><strong>Some Person said:</strong> Bacon ipsum dolor sit amet nulla ham qui sint exercitation eiusmod commodo, chuck duis velit. Aute in reprehenderit, dolore aliqua non est magna in labore pig pork biltong.</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="small-2 columns"><img src="http://placehold.it/40x40&amp;text=[img]"></div>
                                <div class="small-10 columns">
                                    <p><strong>Some Person said:</strong> Bacon ipsum dolor sit amet nulla ham qui sint exercitation eiusmod commodo, chuck duis velit. Aute in reprehenderit, dolore aliqua non est magna in labore pig pork biltong.</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
