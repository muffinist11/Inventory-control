<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <a href="" class="brand-link">
    <span class="brand-text font-weight-light">カテゴリー</span>
  </a>
    <div class="sidebar">
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item menu-open">
            <ul class="nav nav-treeview">
              <?php foreach ($category_name as $value) : ?>
              <li class="nav-item">
                <a href="/Management/index?category_id=<?php echo $value['category'];?>" 
                class="nav-link active">
                    <p>
                      <?php echo $value['category'];?>
                    </p>
                </a>
              </li>
              <?php endforeach; ?>
            </ul>
          </li>
        </ul>
      </nav>
    </div>
</aside> 