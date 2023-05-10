  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Sidebar -->
      <div class="sidebar">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <li class="nav-item">
                  <a href="{{ route('admin.index') }}" class="nav-link">
                      <i class="nav-icon far fa-image"></i>
                      <p>
                          Главная
                      </p>
                  </a>
              </li>
              <li class="nav-item">
                  <a href="{{ route('admin.product.index') }}" class="nav-link">
                      <i class="nav-icon far fa-image"></i>
                      <p>
                          Продукты
                      </p>
                  </a>
              </li>
              <li class="nav-item">
                  <a href="{{ route('admin.category.index') }}" class="nav-link">
                      <i class="nav-icon far fa-image"></i>
                      <p>
                          Категории
                      </p>
                  </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.subcategory.index') }}" class="nav-link">
                    <i class="nav-icon far fa-image"></i>
                    <p>
                        Подкатегории
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.subcategory_2.index') }}" class="nav-link">
                    <i class="nav-icon far fa-image"></i>
                    <p>
                        Подкатегории_2
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.orders.index') }}" class="nav-link">
                    <i class="nav-icon far fa-image"></i>
                    <p>
                        Заказы
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.reviews.index') }}" class="nav-link">
                    <i class="nav-icon far fa-image"></i>
                    <p>
                        Отзывы
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.promokode.index') }}" class="nav-link">
                    <i class="nav-icon far fa-image"></i>
                    <p>
                        Промокоды
                    </p>
                </a>
            </li>
          </ul>
      </div>
      <!-- /.sidebar -->
  </aside>
