<option value="<?php echo $id; ?>"><?php echo $tab . $menu['name']; ?></option>

<?php if (isset($menu['childs'])): ?>
    <?php echo $this->getMenuHtml($menu['childs'], '&nbsp;' . $tab . '-'); ?>
<?php endif; ?>