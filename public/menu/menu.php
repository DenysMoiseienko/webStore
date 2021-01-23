<li class="nav-item">
    <a class="nav-link" href="category/<?=$category['alias'];?>"><?=$category['title'];?></a>
    <?php if (isset($category['childs'])): ?>
        <button class="menu-has-items-toggle"><i class="fa fa-angle-right" aria-hidden="true"></i></button>
        <ul>
            <?=$this->getMenuHtml($category['childs']);?>
        </ul>
    <?php endif; ?>
</li>