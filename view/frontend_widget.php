<?php
/**
 * Frontend Widget view
 */
require_once "setting-option-data.php"; ?>
<div id="sidebar_posts">
    <h3 class="widgettitle">Recommended Posts</h3>
    <ul>
        <li id="sidebar_posts_one">
            <?php outputSidebarWidgetListItem($dropdown_value_one) ?>
        </li>
        <li id="sidebar_posts_two">
            <?php outputSidebarWidgetListItem($dropdown_value_two) ?>
        </li>
        <li id="sidebar_posts_three">
            <?php outputSidebarWidgetListItem($dropdown_value_three) ?>
        </li>
        <li id="sidebar_posts_four">
            <?php outputSidebarWidgetListItem($dropdown_value_four) ?>
        </li>
        <li id="sidebar_posts_five">
            <?php outputSidebarWidgetListItem($dropdown_value_five) ?>
        </li>
        <li id="sidebar_posts_six">
            <?php outputSidebarWidgetListItem($dropdown_value_six) ?>
        </li>
    </ul>
</div>