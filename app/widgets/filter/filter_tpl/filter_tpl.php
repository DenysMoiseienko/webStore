<?php foreach ($this->groups as $group_id => $group_item): ?>
    <section>
        <h4><?=$group_item;?></h4>
        <div>
              <div class="col col-2">
                  <?php if (isset($this->attrs[$group_id])): ?>
                      <?php foreach ($this->attrs[$group_id] as $attr_id => $value): ?>
                          <?php
                          if (!empty($filter) && in_array($attr_id, $filter)) {
                              $checked = 'checked';
                          } else {
                              $checked = null;
                          }
                          ?>
                          <input type="checkbox" name="checkbox" value="<?=$attr_id;?>" <?=$checked;?>><i></i>
                           <?=$value; ?>
                      <?php endforeach; ?>
                  <?php endif; ?>
              </div>
        </div>
    </section>
<?php endforeach; ?>


