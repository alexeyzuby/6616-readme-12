<div class="container">
    <h1 class="page__title page__title--popular">Популярное</h1>
</div>
<div class="popular container">
    <div class="popular__filters-wrapper">
        <div class="popular__sorting sorting">
            <b class="popular__sorting-caption sorting__caption">Сортировка:</b>
            <ul class="popular__sorting-list sorting__list">
                <li class="sorting__item sorting__item--popular">
                    <a class="sorting__link sorting__link--active" href="#">
                        <span>Популярность</span>
                        <svg class="sorting__icon" width="10" height="12">
                            <use xlink:href="#icon-sort"></use>
                        </svg>
                    </a>
                </li>
                <li class="sorting__item">
                    <a class="sorting__link" href="#">
                        <span>Лайки</span>
                        <svg class="sorting__icon" width="10" height="12">
                            <use xlink:href="#icon-sort"></use>
                        </svg>
                    </a>
                </li>
                <li class="sorting__item">
                    <a class="sorting__link" href="#">
                        <span>Дата</span>
                        <svg class="sorting__icon" width="10" height="12">
                            <use xlink:href="#icon-sort"></use>
                        </svg>
                    </a>
                </li>
            </ul>
        </div>
        <div class="popular__filters filters">
            <b class="popular__filters-caption filters__caption">Тип контента:</b>
            <ul class="popular__filters-list filters__list">
                <li class="popular__filters-item popular__filters-item--all filters__item filters__item--all">
                    <a class="filters__button filters__button--ellipse filters__button--all<?= activeFilterHandler($filterTypeId); ?>" href="/">
                        <span>Все</span>
                    </a>
                </li>
                <?php foreach ($contentTypes as $key => $value): ?>
                    <li class="popular__filters-item filters__item">
                        <a class="filters__button filters__button--<?= $value[ 'type_class' ] ?><?= activeFilterHandler($filterTypeId,
                            $value[ 'id' ]); ?> button" href="?type_id=<?= $value[ 'id' ] ?>">
                            <span class="visually-hidden"><?= $value[ 'type_name' ] ?></span>
                            <svg class="filters__icon" width="22" height="18">
                                <use xlink:href="#icon-filter-<?= $value[ 'type_class' ] ?>"></use>
                            </svg>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
    <div class="popular__posts">
        <?php foreach ($posts as $key => $value): ?>
            <article
                class="popular__post post<?= htmlspecialchars($value[ 'type_class' ]) ? ' post-' . htmlspecialchars($value[ 'type_class' ]) : '' ?>">
                <header class="post__header">
                    <h2><a href="post.php?id=<?= $value[ 'id' ]; ?>"><?= htmlspecialchars($value[ 'title' ]); ?></a></h2>
                </header>
                <div class="post__main">
                    <?php switch ($value[ 'type_class' ]):
                        case 'text': ?>
                            <?= trimContent(htmlspecialchars($value[ 'content' ])); ?>
                            <?php break;
                        case 'quote': ?>
                            <blockquote>
                                <p><?= htmlspecialchars($value[ 'content' ]); ?></p>
                                <cite><?= htmlspecialchars($value[ 'quote_author' ]) ? htmlspecialchars($value[ 'quote_author' ]) :
                                        'Неизвестный автор'; ?></cite>
                            </blockquote>
                            <?php break;
                        case 'photo': ?>
                            <div class="post-photo__image-wrapper">
                                <img src="img/<?= htmlspecialchars($value[ 'image' ]); ?>" alt="Фото от пользователя" width="360" height="240">
                            </div>
                            <?php break;
                        case 'link': ?>
                            <div class="post-link__wrapper">
                                <a class="post-link__external" href="https://<?= htmlspecialchars($value[ 'link' ]); ?>" title="Перейти по ссылке">
                                    <div class="post-link__info-wrapper">
                                        <div class="post-link__icon-wrapper">
                                            <img src="https://www.google.com/s2/favicons?domain=vitadental.ru" alt="Иконка">
                                        </div>
                                        <div class="post-link__info">
                                            <h3><?= htmlspecialchars($value[ 'title' ]); ?></h3>
                                        </div>
                                    </div>
                                    <span><?= htmlspecialchars($value[ 'link' ]); ?></span>
                                </a>
                            </div>
                            <?php break;
                    endswitch; ?>
                </div>
                <footer class="post__footer">
                    <div class="post__author">
                        <a class="post__author-link" href="#" title="Автор">
                            <div class="post__avatar-wrapper">
                                <img class="post__author-avatar" src="img/<?= htmlspecialchars($value[ 'avatar' ]); ?>" alt="Аватар пользователя">
                            </div>
                            <div class="post__info">
                                <b class="post__author-name"><?= htmlspecialchars($value[ 'login' ]); ?></b>
                                <?php $generatedDate = generate_random_date($key); ?>
                                <time class="post__time" datetime="<?= $generatedDate; ?>"
                                    title="<?= date('d.m.Y H:i', strtotime($generatedDate)); ?>"><?= getRelativeData($generatedDate); ?></time>
                            </div>
                        </a>
                    </div>
                    <div class="post__indicators">
                        <div class="post__buttons">
                            <a class="post__indicator post__indicator--likes button" href="#" title="Лайк">
                                <svg class="post__indicator-icon" width="20" height="17">
                                    <use xlink:href="#icon-heart"></use>
                                </svg>
                                <svg class="post__indicator-icon post__indicator-icon--like-active" width="20" height="17">
                                    <use xlink:href="#icon-heart-active"></use>
                                </svg>
                                <span><?= $value[ 'likes_count' ]; ?></span>
                                <span class="visually-hidden">количество лайков</span>
                            </a>
                            <a class="post__indicator post__indicator--comments button" href="#" title="Комментарии">
                                <svg class="post__indicator-icon" width="19" height="17">
                                    <use xlink:href="#icon-comment"></use>
                                </svg>
                                <span><?= $value[ 'comments_count' ]; ?></span>
                                <span class="visually-hidden">количество комментариев</span>
                            </a>
                        </div>
                    </div>
                </footer>
            </article>
        <?php endforeach; ?>
    </div>
</div>
