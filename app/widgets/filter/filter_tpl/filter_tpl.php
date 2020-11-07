<?php foreach ($this->groups as $group_id => $group_item): ?>
    <div class="filters-group">
        <div class="group-title"><?=$group_item;?></div>
            <?php if (isset($this->attrs[$group_id])): ?>
                <?php foreach ($this->attrs[$group_id] as $attr_id => $value): ?>
                    <div>
                    <?php
                    if (!empty($filter) && in_array($attr_id, $filter)) {
                        $checked = 'checked';
                    } else {
                        $checked = null;
                    }
                    ?>
                    <input type="checkbox" name="checkbox" value="<?=$attr_id;?>" <?=$checked;?>><i></i>
                    <?=$value; ?>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
    </div>
<?php endforeach; ?>


