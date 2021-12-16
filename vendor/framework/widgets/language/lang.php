<select class="selectpicker" id="lang">
    <option value="<?php echo $this->language['code'];?>"><?php echo $this->language['name'];?></option>
    <?php foreach($this->languages as $k => $v): ?>
        <?php if($this->language['code'] != $k): ?>
            <option value="<?php echo $k;?>"><?php echo $v['name'];?></option>
        <?php endif; ?>
    <?php endforeach; ?>
</select>

