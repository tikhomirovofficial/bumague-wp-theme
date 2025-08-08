<?php
/**
 * Секция цен услуги
 */
?>

<section class="section">
    <div class="section__body">
        <div class="prices container">
            <div class="prices__inner">
                <div class="prices__header">
                    <h2 class="prices__title title--alt">Цены</h2>
                    <?php if (get_field('prices_description')): ?>
                        <div class="section__description prices__description">
                            <?php the_field('prices_description'); ?>
                        </div>
                    <?php endif; ?>
                </div>

                <?php if (have_rows('prices_tabs')): ?>
                    <div class="prices__body">
                        <!-- Вкладки -->
                        <div class="prices__tabs">
                            <?php
                            $tab_index = 0;
                            while (have_rows('prices_tabs')):
                                the_row();
                                $tab = get_sub_field('prices_tab');
                                $active_class = $tab_index === 0 ? 'prices__tabs-item--active' : '';
                                ?>
                                <div class="prices__tabs-item <?php echo $active_class; ?>"
                                    data-tab-index="<?php echo $tab_index; ?>">
                                    <span class="prices__tabs-item-name"><?php echo esc_html($tab['p_tab_name']); ?></span>
                                    <?php if (!empty($tab['p_tab_caption'])): ?>
                                        <span
                                            class="prices__tabs-item-caption">(<?php echo esc_html($tab['p_tab_caption']); ?>)</span>
                                    <?php endif; ?>
                                </div>
                                <?php
                                $tab_index++;
                            endwhile;
                            ?>
                        </div>

                        <!-- Содержимое вкладок -->
                        <div class="prices__content">
                            <?php
                            $content_index = 0;
                            while (have_rows('prices_tabs')):
                                the_row();
                                $tab = get_sub_field('prices_tab');
                                $active_class = $content_index === 0 ? 'prices__tab--active' : '';
                                ?>
                                <div class="prices__tab <?php echo $active_class; ?>"
                                    data-content-index="<?php echo $content_index; ?>">
                                    <?php if (!empty($tab['p_tab_columns'])): ?>
                                        <table class="prices__table">
                                            <thead>
                                                <tr>
                                                    <?php foreach ($tab['p_tab_columns'] as $column): ?>
                                                        <th><?php echo esc_html($column['p_tab_column_name']); ?></th>
                                                    <?php endforeach; ?>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                // Определяем максимальное количество строк
                                                $max_rows = 0;
                                                foreach ($tab['p_tab_columns'] as $column) {
                                                    if (!empty($column['p_tab_column_cells'])) {
                                                        $cell_count = count($column['p_tab_column_cells']);
                                                        $max_rows = max($max_rows, $cell_count);
                                                    }
                                                }

                                                // Выводим строки
                                                for ($i = 0; $i < $max_rows; $i++):
                                                    ?>
                                                    <tr>
                                                        <?php foreach ($tab['p_tab_columns'] as $column): ?>
                                                            <td>
                                                                <?php
                                                                if (isset($column['p_tab_column_cells'][$i]['p_tab_price_cell'])) {
                                                                    echo esc_html($column['p_tab_column_cells'][$i]['p_tab_price_cell']);
                                                                }
                                                                ?>
                                                            </td>
                                                        <?php endforeach; ?>
                                                    </tr>
                                                <?php endfor; ?>
                                            </tbody>
                                        </table>
                                    <?php endif; ?>
                                </div>
                                <?php
                                $content_index++;
                            endwhile;
                            ?>
                        </div>

                        <?php if (get_field('prices_caption')): ?>
                            <div class="prices__caption">
                                <span><?php the_field('prices_caption'); ?></span>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>