<div class="wrap">
    <h1>CPT Manager</h1>
    <?php settings_errors(); ?>

    <ul class="nav nav-tabs">
        <li class="active">
            <a href="#tab-1">Your Custom Post Types</a>
        </li>
        <li>
            <a href="#tab-2">Add Custom Post Type</a>
        </li>
        <li>
            <a href="#tab-3">Export</a>
        </li>
    </ul>

    <div class="tab-content">
        <div id="tab-1" class="tab-pane active">
            <h3>Manager your Custom Post Types</h3>
            <table class="cpt-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Singular Name</th>
                        <th>Plural Name</th>
                        <th>Public</th>
                        <th>Archive</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $options = get_option('melotec_cpt') ?: [];
                    ?>
                    <?php foreach($options as $option): ?>
                            <?php 
                                $public      = $option['public'] ?? 0;
                                $has_archive = $option['has_archive'] ?? 0;
                            ?>
                            <tr>
                                <td><?= $option['post_type'] ?></td>
                                <td><?= $option['singular_name'] ?></td>
                                <td><?= $option['plural_name'] ?></td>
                                <td><?= $public == 1 ? 'yes' : 'no' ?></td>
                                <td><?= $has_archive == 1 ? 'yes' : 'no' ?></td>
                                <td><a href="\#">EDIT</a> - <a href="\#">DELETE</a></td>
                            </tr>
                    <?php endforeach; ?> 
                </tbody>
            </table>
        </div>
        <div id="tab-2" class="tab-pane">
            <form method="post" action="options.php">
                <?php 
                    settings_fields('melotec_cpt_settings');
                    do_settings_sections('melotec_cpt');
                    submit_button();
                ?>
            </form>
        </div>
        <div id="tab-3" class="tab-pane">
            <h3>Export Your Custom Post Types</h3>
        </div>
    </div>
</div>