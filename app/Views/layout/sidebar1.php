            <nav id="sidebar">
                <div class="sidebar_blog_1">
                    <div class="sidebar-header">
                        <div class="logo_section">
                            <a href="index.html"><img class="logo_icon img-responsive" src="images/logo/logo_icon.png" alt="#" /></a>
                        </div>
                    </div>
                    <div class="sidebar_user_info">
                        <div class="icon_setting"></div>
                        <div class="user_profle_side">

                            <div class="user_info">
                                <h6><?= session()->get('nama'); ?></h6>
                                <p><span class="online_animation"></span> Online</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sidebar_blog_2">
                    <ul class="list-unstyled components">
                        <li>
                            <a href="<?= base_url(); ?>/dashboard"><i class="fa fa-dashboard yellow_color"></i><span>Dashboard</span></a>
                        </li>
                        <li><a href="<?= base_url(); ?>/pembayaran"><i class="fa fa-money green_color"></i> <span>Pembayaran</span></a></li>
                        <li>
                        <li><a href="<?= base_url(); ?>/kategori"><i class="fa fa-reorder orange_color"></i> <span>Kategori Produk</span></a></li>
                        <li>
                        <li><a href="<?= base_url(); ?>/barang"><i class="fa fa-archive blue2_color"></i> <span>Barang</span></a></li>
                        <li>
                        <li><a href="<?= base_url(); ?>/transaksi"><i class="fa fa-line-chart red_color"></i> <span>Transaksi</span></a></li>
                        <li>
                        <li><a href="<?= base_url(); ?>/laporan"><i class="fa fa-rss blue2_color"></i> <span>Laporan</span></a></li>
                        <li><a href="<?= base_url(); ?>/user"><i class="fa fa-user purple_color"></i> <span>User</span></a></li>

                        <!-- <li>
                            <a href="#element" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-diamond purple_color"></i> <span>Elements</span></a>
                            <ul class="collapse list-unstyled" id="element">
                                <li><a href="general_elements.html">> <span>General Elements</span></a></li>
                                <li><a href="media_gallery.html">> <span>Media Gallery</span></a></li>
                                <li><a href="icons.html">> <span>Icons</span></a></li>
                                <li><a href="invoice.html">> <span>Invoice</span></a></li>
                            </ul>
                        </li>
                        <li><a href="tables.html"><i class="fa fa-table purple_color2"></i> <span>Tables</span></a></li>
                        <li>
                            <a href="#apps" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-object-group blue2_color"></i> <span>Apps</span></a>
                            <ul class="collapse list-unstyled" id="apps">
                                <li><a href="email.html">> <span>Email</span></a></li>
                                <li><a href="calendar.html">> <span>Calendar</span></a></li>
                                <li><a href="media_gallery.html">> <span>Media Gallery</span></a></li>
                            </ul>
                        </li>
                        <li><a href="price.html"><i class="fa fa-briefcase blue1_color"></i> <span>Pricing Tables</span></a></li>
                        <li>
                            <a href="contact.html">
                                <i class="fa fa-paper-plane red_color"></i> <span>Contact</span></a>
                        </li>
                        <li class="active">
                            <a href="#additional_page" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-clone yellow_color"></i> <span>Additional Pages</span></a>
                            <ul class="collapse list-unstyled" id="additional_page">
                                <li>
                                    <a href="profile.html">> <span>Profile</span></a>
                                </li>
                                <li>
                                    <a href="project.html">> <span>Projects</span></a>
                                </li>
                                <li>
                                    <a href="login.html">> <span>Login</span></a>
                                </li>
                                <li>
                                    <a href="404_error.html">> <span>404 Error</span></a>
                                </li>
                            </ul>
                        </li>
                        <li><a href="map.html"><i class="fa fa-map purple_color2"></i> <span>Map</span></a></li>
                        <li><a href="charts.html"><i class="fa fa-bar-chart-o green_color"></i> <span>Charts</span></a></li>
                        <li><a href="settings.html"><i class="fa fa-cog yellow_color"></i> <span>Settings</span></a></li> -->
                    </ul>
                </div>
            </nav>
            <div class="topbar">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <div class="full">

                        <div class="right_topbar">
                            <div class="icon_info">
                                <ul class="user_profile_dd">
                                    <li>
                                        <a class="dropdown-toggle" data-toggle="dropdown"><span class="name_user"><?= session()->get('nama'); ?></span></a>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="setting/<?= session()->get('id_user') ?>">Setting</a>
                                            <a class="dropdown-item" href="<?= base_url(); ?>/logout"><span>Log Out</span> <i class="fa fa-sign-out"></i></a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>