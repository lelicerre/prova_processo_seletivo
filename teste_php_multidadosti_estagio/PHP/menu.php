<?php
include 'menu_items.php';
if (!@include 'menu_items.php') {
    die("Erro ao incluir o arquivo menu_items.php");
} ?>

<div class="page-sidebar-wrapper">
    <div class="page-sidebar navbar-collapse collapse">
        <!-- BEGIN SIDEBAR MENU -->
        <ul class="page-sidebar-menu">
            <li class="sidebar-toggler-wrapper">
                <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                <div class="sidebar-toggler hidden-phone">
                </div>
                <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
            </li>
            <li class="sidebar-search-wrapper">
                <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
                <form class="sidebar-search" action="extra_search.html" method="POST">
                    <div class="form-container">
                        <div class="input-box">
                            <a href="javascript:;" class="remove"></a>
                            <input type="text" placeholder="Search..."/>
                            <input type="button" class="submit" value=" "/>
                        </div>
                    </div>
                </form>
                <!-- END RESPONSIVE QUICK SEARCH FORM -->
            </li>
            <?php
            foreach ($menuItems as $item) {
                echo '<li class="">';
                if (isset($item['subItems'])) {
                    echo '<a href="javascript:;">';
                } else {
                    echo '<a href="' . $item['link'] . '">';
                }
                echo '<i class="' . $item['icon'] . '"></i>';
                echo '<span class="title">' . $item['title'] . '</span>';
                echo '</a>';
                if (isset($item['subItems'])) {
                    echo '<ul class="sub-menu">';
                    foreach ($item['subItems'] as $subItem) {
                        echo '<li>';
                        echo '<a href="' . $subItem['link'] . '">' . $subItem['title'] . '</a>';
                        echo '</li>';
                    }
                    echo '</ul>';
                }
                echo '</li>';
            }
            ?>

        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
</div>
