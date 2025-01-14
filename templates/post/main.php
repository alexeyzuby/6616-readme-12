<div class="container">
    <h1 class="page__title page__title--publication"><?= $post[ 'title' ]; ?></h1>
    <section class="post-details">
        <h2 class="visually-hidden">Публикация</h2>
        <div class="post-details__wrapper post-<?= $post[ 'type_class' ]; ?>">
            <div class="post-details__main-block post post--details">
                <?php switch ($post[ 'type_class' ]) {
                    case 'text':
                        echo include_template('post/text.php', ['post' => $post]);
                        break;
                    case 'quote':
                        echo include_template('post/quote.php', ['post' => $post]);
                        break;
                    case 'photo':
                        echo include_template('post/photo.php', ['post' => $post]);
                        break;
                    case 'link':
                        echo include_template('/post/link.php', ['post' => $post]);
                        break;
                    case 'video':
                        echo include_template('post/video.php', ['post' => $post]);
                        break;
                } ?>

                <div class="post__indicators">
                    <div class="post__buttons">
                        <a class="post__indicator post__indicator--likes button" href="#" title="Лайк">
                            <svg class="post__indicator-icon" width="20" height="17">
                                <use xlink:href="#icon-heart"></use>
                            </svg>
                            <svg class="post__indicator-icon post__indicator-icon--like-active" width="20" height="17">
                                <use xlink:href="#icon-heart-active"></use>
                            </svg>
                            <span><?= $post[ 'likes_count' ] ?></span>
                            <span class="visually-hidden">количество лайков</span>
                        </a>
                        <a class="post__indicator post__indicator--comments button" href="#" title="Комментарии">
                            <svg class="post__indicator-icon" width="19" height="17">
                                <use xlink:href="#icon-comment"></use>
                            </svg>
                            <span><?= $post[ 'comments_count' ] ?></span>
                            <span class="visually-hidden">количество комментариев</span>
                        </a>
                        <a class="post__indicator post__indicator--repost button" href="#" title="Репост">
                            <svg class="post__indicator-icon" width="19" height="17">
                                <use xlink:href="#icon-repost"></use>
                            </svg>
                            <span>5</span>
                            <span class="visually-hidden">количество репостов</span>
                        </a>
                    </div>
                    <span class="post__view"><?= $post[ 'show_count' ] . ' ' .
                        get_noun_plural_form($post[ 'show_count' ], 'просмотр', 'просмотра', 'просмотров'); ?></span>
                </div>
                <ul class="post__tags">
                    <li><a href="#">#nature</a></li>
                    <li><a href="#">#globe</a></li>
                    <li><a href="#">#photooftheday</a></li>
                    <li><a href="#">#canon</a></li>
                    <li><a href="#">#landscape</a></li>
                    <li><a href="#">#щикарныйвид</a></li>
                </ul>
                <div class="comments">
                    <form class="comments__form form" action="#" method="post">
                        <div class="comments__my-avatar">
                            <img class="comments__picture" src="img/userpic-medium.jpg" alt="Аватар пользователя">
                        </div>
                        <div class="form__input-section form__input-section--error">
                            <textarea class="comments__textarea form__textarea form__input" placeholder="Ваш комментарий"></textarea>
                            <label class="visually-hidden">Ваш комментарий</label>
                            <button class="form__error-button button" type="button">!</button>
                            <div class="form__error-text">
                                <h3 class="form__error-title">Ошибка валидации</h3>
                                <p class="form__error-desc">Это поле обязательно к заполнению</p>
                            </div>
                        </div>
                        <button class="comments__submit button button--green" type="submit">Отправить</button>
                    </form>
                    <div class="comments__list-wrapper">
                        <?php if ($postComments): ?>
                            <ul class="comments__list">
                                <?php foreach ($postComments as $key => $value): ?>
                                    <li class="comments__item user">
                                        <div class="comments__avatar">
                                            <a class="user__avatar-link" href="#">
                                                <img class="comments__picture" src="img/<?= $value[ 'avatar' ] ?>" alt="Аватар пользователя">
                                            </a>
                                        </div>
                                        <div class="comments__info">
                                            <div class="comments__name-wrapper">
                                                <a class="comments__user-name" href="#">
                                                    <span><?= $value[ 'login' ] ?></span>
                                                </a>
                                                <time class="comments__time"
                                                    datetime="<?= $value[ 'date_add' ] ?>"><?= getRelativeData($value[ 'date_add' ]); ?></time>
                                            </div>
                                            <p class="comments__text">
                                                <?= $value[ 'content' ] ?>
                                            </p>
                                        </div>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                            <a class="comments__more-link" href="#">
                                <span>Показать все комментарии</span>
                                <sup class="comments__amount"><?= $post[ 'comments_count' ] ?></sup>
                            </a>
                        <?php else: ?>
                            <p>Комментариев нет</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="post-details__user user">
                <div class="post-details__user-info user__info">
                    <div class="post-details__avatar user__avatar">
                        <a class="post-details__avatar-link user__avatar-link" href="#">
                            <img class="post-details__picture user__picture" src="img/<?= $post[ 'avatar' ]; ?>" alt="Аватар пользователя">
                        </a>
                    </div>
                    <div class="post-details__name-wrapper user__name-wrapper">
                        <a class="post-details__name user__name" href="#">
                            <span><?= $post[ 'login' ]; ?></span>
                        </a>
                        <time class="post-details__time user__time"
                            datetime="<?= $post[ 'date_register' ]; ?>"><?= getRelativeData($post[ 'date_register' ], true); ?></time>
                    </div>
                </div>
                <div class="post-details__rating user__rating">
                    <p class="post-details__rating-item user__rating-item user__rating-item--subscribers">
                        <span class="post-details__rating-amount user__rating-amount"><?= $post[ 'subscribers_count' ]; ?></span>
                        <span class="post-details__rating-text user__rating-text"><?= get_noun_plural_form($post[ 'subscribers_count' ],
                                'подписчик', 'подписчика', 'подписчиков'); ?></span>
                    </p>
                    <p class="post-details__rating-item user__rating-item user__rating-item--publications">
                        <span class="post-details__rating-amount user__rating-amount"><?= $post[ 'posts_count' ]; ?></span>
                        <span class="post-details__rating-text user__rating-text"><?= get_noun_plural_form($post[ 'posts_count' ], 'публикация',
                                'публикации', 'публикаций'); ?></span>
                    </p>
                </div>
                <div class="post-details__user-buttons user__buttons">
                    <button class="user__button user__button--subscription button button--main" type="button">Подписаться</button>
                    <a class="user__button user__button--writing button button--green" href="#">Сообщение</a>
                </div>
            </div>
        </div>
    </section>
</div>
