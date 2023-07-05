<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="<?php echo base_url() ?>" class="app-brand-link">
             
              <span class="app-brand-text demo menu-text fw-bolder ms-2">Monte Carlo</span>
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Dashboard -->
            <li class="menu-item <?php echo $hal == 'home' ? 'active' : '' ?>">
              <a href="<?php echo base_url() ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
              </a>
            </li>
            <li class="menu-item <?php echo $hal == 'Persediaan' ? 'active' : '' ?>">
              <a href="<?php echo base_url() ?>distribusi" class="menu-link">
                <i class="menu-icon tf-icons bx bx-data"></i>
                <div data-i18n="Analytics">Persediaan</div>
              </a>
            </li>
            <li class="menu-item <?php echo $hal == 'Permintaan' ? 'active' : '' ?>">
              <a href="<?php echo base_url() ?>permintaan" class="menu-link">
                <i class="menu-icon tf-icons bx bx-data"></i>
                <div data-i18n="Analytics">Permintaan</div>
              </a>
            </li>
            <li class="menu-item <?php echo $hal == 'Angka Random' ? 'active' : '' ?>">
              <a href="<?php echo base_url() ?>angka-random" class="menu-link">
                <i class="menu-icon tf-icons bx bx-analyse"></i>
                <div data-i18n="Analytics">Angka Random</div>
              </a>
            </li>
            <li class="menu-item <?php echo $hal == 'Hasil Perhitungan' ? 'active' : '' ?>">
              <a href="<?php echo base_url() ?>hasil" class="menu-link">
                <i class="menu-icon tf-icons bx bx-file"></i>
                <div data-i18n="Analytics">Hasil Perhitungan</div>
              </a>
            </li>
            <!-- <li class="menu-item <?php echo $hal == 'Grafik' ? 'active' : '' ?>">
              <a href="<?php echo base_url() ?>grafik" class="menu-link">
                <i class="menu-icon tf-icons bx bx-chart"></i>
                <div data-i18n="Analytics">Grafik</div>
              </a>
            </li> -->
            <li class="menu-item">
              <a onclick="return confirm('apakah anda yakin?')" href="<?php echo base_url() ?>welcome/logout" class="menu-link">
                <i class="menu-icon tf-icons bx bx-power-off"></i>
                <div data-i18n="Analytics">Log Out</div>
              </a>
            </li>

            
          </ul>
        </aside>