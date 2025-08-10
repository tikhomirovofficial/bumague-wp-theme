<?php
/**
 * Секция калькулятора (переиспользуемая)
 */
?>

<section class="section">
	<header class="section__header container">
		<h2 class="section__titl section__title--wide">
			волшебный <span class="c-main">калькулятор</span>
			который считает со скидкой
		</h2>
	</header>
	<div class="section__body">
		<div class="calculator container">
			<div class="calculator__inner">
				<header class="calculator__header">
					<span class="calculator__title title--alt">Посчитаем?</span>
					<div class="calculator__service">// <?php the_title(); ?></div>
				</header>

				<?php
				$service_calc = get_field('service_calc');
				if ($service_calc):
					?>
					<form class="calculator__body" id="calculatorForm">
						<input id="request-name" value="<?php the_title(); ?>" name="service" type="text"
							class="visually-hidden">

						<!-- Шаги калькулятора -->
						<div class="calculator__steps">
							<ul class="calculator__steps-list">
								<?php
								$steps = [
									1 => 'Размер',
									2 => 'Тираж',
									3 => 'Печать',
									4 => 'Цветность',
									5 => 'Ламинация',
									6 => 'Сроки',
									7 => 'Просчёт'
								];
								foreach ($steps as $step_num => $step_name):
									$active_class = $step_num === 2 ? 'calculator__steps-item--active' : '';
									?>
									<li class="calculator__steps-item <?php echo $active_class; ?>"
										data-step="<?php echo $step_num; ?>">
										<div class="calculator__steps-item-number">
											<?php echo str_pad($step_num, 2, '0', STR_PAD_LEFT); ?>
										</div>
										<span class="calculator__steps-item-name"><?php echo $step_name; ?></span>
									</li>
									<?php if ($step_num < 7): ?>
										<span class="calculator__steps-line"></span>
									<?php endif; ?>
								<?php endforeach; ?>
							</ul>
						</div>

						<!-- Контент шагов -->
						<div class="calculator__content">
							<!-- Шаг 1: Размер -->
							<div class="calculator__tab calculator__tab--active" data-calc-tab="1">
								<h3 class="calculator__tab-title">Размер</h3>
								<div class="calculator__options">
									<?php
									$size_options = $service_calc['calc_size']['calc_size_options'];
									if ($size_options):
										foreach ($size_options as $option):
											?>
											<label class="calculator__option">
												<input class="visually-hidden" type="radio" name="size"
													value="<?php echo esc_attr($option['calc_size_o_name']); ?>" required>
												<span class="calculator__option-checkbox"></span>
												<div class="calculator__option-content">
													<span
														class="calculator__option-name"><?php echo esc_html($option['calc_size_o_name']); ?></span>
												</div>
											</label>
											<?php
										endforeach;
									endif;
									?>
									<label class="calculator__option">
										<input class="visually-hidden" type="radio" name="size" value="custom" required>
										<span class="calculator__option-checkbox"></span>
										<div class="calculator__option-content">
											<span class="calculator__option-name">Свой вариант</span>
										</div>
									</label>
								</div>
							</div>

							<!-- Шаг 2: Тираж -->
							<div class="calculator__tab" data-calc-tab="2">
								<h3 class="calculator__tab-title">Тираж</h3>
								<div class="calculator__options">
									<?php
									$count_options = $service_calc['calc_count']['calc_count_options'];
									if ($count_options):
										foreach ($count_options as $option):
											?>
											<label class="calculator__option">
												<input class="visually-hidden" type="radio" name="quantity"
													value="<?php echo esc_attr($option['calc_count_o_name']); ?>" required>
												<span class="calculator__option-checkbox"></span>
												<div class="calculator__option-content">
													<span
														class="calculator__option-name"><?php echo esc_html($option['calc_count_o_name']); ?></span>
												</div>
											</label>
											<?php
										endforeach;
									endif;
									?>
									<label class="calculator__option">
										<input class="visually-hidden" type="radio" name="quantity" value="custom" required>
										<span class="calculator__option-checkbox"></span>
										<div class="calculator__option-content">
											<span class="calculator__option-name">Свой вариант</span>
										</div>
									</label>
								</div>
							</div>

							<!-- Шаг 3: Печать -->
							<div class="calculator__tab" data-calc-tab="3">
								<h3 class="calculator__tab-title">Печать</h3>
								<div class="calculator__options">
									<?php
									$print_options = $service_calc['calc_print']['calc_print_options'];
									if ($print_options):
										foreach ($print_options as $option):
											?>
											<label class="calculator__option">
												<input class="visually-hidden" type="radio" name="material"
													value="<?php echo esc_attr($option['calc_print_o_name']); ?>" required>
												<span class="calculator__option-checkbox"></span>
												<div class="calculator__option-content">
													<span
														class="calculator__option-name"><?php echo esc_html($option['calc_print_o_name']); ?></span>
												</div>
											</label>
											<?php
										endforeach;
									endif;
									?>
								</div>
							</div>

							<!-- Шаг 4: Цветность -->
							<div class="calculator__tab" data-calc-tab="4">
								<h3 class="calculator__tab-title">Цветность</h3>
								<div class="calculator__options">
									<?php
									$color_options = $service_calc['calc_color']['calc_color_options'];
									if ($color_options):
										foreach ($color_options as $option):
											?>
											<label class="calculator__option">
												<input class="visually-hidden" type="radio" name="colors"
													value="<?php echo esc_attr($option['calc_color_o_name']); ?>" required>
												<span class="calculator__option-checkbox"></span>
												<div class="calculator__option-content">
													<span
														class="calculator__option-name"><?php echo esc_html($option['calc_color_o_name']); ?></span>
												</div>
											</label>
											<?php
										endforeach;
									endif;
									?>
								</div>
							</div>

							<!-- Шаг 5: Ламинация -->
							<div class="calculator__tab" data-calc-tab="5">
								<h3 class="calculator__tab-title">Ламинация</h3>
								<div class="calculator__options">
									<?php
									$lam_options = $service_calc['calc_lam']['calc_lam_options'];
									if ($lam_options):
										foreach ($lam_options as $option):
											?>
											<label class="calculator__option">
												<input class="visually-hidden" type="radio" name="lamination"
													value="<?php echo esc_attr($option['calc_lam_o_name']); ?>" required>
												<span class="calculator__option-checkbox"></span>
												<div class="calculator__option-content">
													<span
														class="calculator__option-name"><?php echo esc_html($option['calc_lam_o_name']); ?></span>
												</div>
											</label>
											<?php
										endforeach;
									endif;
									?>
								</div>
							</div>

							<!-- Шаг 6: Сроки -->
							<div class="calculator__tab" data-calc-tab="6">
								<h3 class="calculator__tab-title">Сроки</h3>
								<div class="calculator__options">
									<?php
									$deadline_options = $service_calc['calc_deadline']['calc_deadline_options'];
									if ($deadline_options):
										foreach ($deadline_options as $option):
											?>
											<label class="calculator__option">
												<input class="visually-hidden" type="radio" name="deadline"
													value="<?php echo esc_attr($option['calc_deadline_o_name']); ?>" required>
												<span class="calculator__option-checkbox"></span>
												<div class="calculator__option-content">
													<span
														class="calculator__option-name"><?php echo esc_html($option['calc_deadline_o_name']); ?></span>
												</div>
											</label>
											<?php
										endforeach;
									endif;
									?>
								</div>
							</div>

							<!-- Шаг 7: Контакты -->
							<div class="calculator__tab" data-calc-tab="7">
								<h3 class="calculator__tab-title">Просчёт</h3>
								<div class="calculator__form">
									<label for="request-name" class="calculator__form-field field">
										<input required id="request-name" name="name" placeholder="Имя" type="text"
											class="field__input">
									</label>
									<label for="request-phone" class="calculator__form-field field">
										<input required name="phone" inputmode="tel" id="request-phone"
											placeholder="Телефон" type="text" class="field__input phone-mask">
									</label>

									<div class="calculator__form-field field field--select field--filled">
										<div class="field__select-wrapper">
											<input type="text" class="field__select-input" placeholder="Способ связи"
												readonly>
											<div class="field__select-indicator">
												<svg width="20" height="20" viewBox="0 0 20 20" fill="none"
													xmlns="http://www.w3.org/2000/svg">
													<path d="M19 6.43396L19 19M19 19L6.43396 19M19 19L1 1"
														stroke="currentColor" stroke-width="2" />
												</svg>
											</div>
										</div>
										<div class="field__select-dropdown">
											<?php
											if (have_rows('request_ways', 'option')):
												$index = 1;
												while (have_rows('request_ways', 'option')):
													the_row();
													$way = get_sub_field('request_ways_item');
													if ($way):
														?>
														<div class="field__select-option" data-value="<?php echo $index; ?>">
															<?php echo esc_html($way); ?>
														</div>
														<?php
														$index++;
													endif;
												endwhile;
											else:
												// Fallback options if no communication ways are set
												?>
												<div class="field__select-option" data-value="1">Звонок на телефон</div>
												<div class="field__select-option" data-value="2">Сообщение в Whatsapp</div>
												<div class="field__select-option" data-value="3">Сообщение в Telegram</div>
											<?php endif; ?>
										</div>
										<select id="request-communication" name="communication" class="field__select-real"
											required>
											<option value="">Выберите способ связи</option>
											<?php
											if (have_rows('request_ways', 'option')):
												$index = 1;
												while (have_rows('request_ways', 'option')):
													the_row();
													$way = get_sub_field('request_ways_item');
													if ($way):
														?>
														<option value="<?php echo $index; ?>">
															<?php echo esc_html($way); ?>
														</option>
														<?php
														$index++;
													endif;
												endwhile;
											else:
												// Fallback options if no communication ways are set
												?>
												<option value="1">Звонок на телефон</option>
												<option value="2">Сообщение в Whatsapp</option>
												<option value="3">Сообщение в Telegram</option>
											<?php endif; ?>>
										</select>
									</div>

									<label for="request-comment" class="calculator__form-field field">
										<textarea id="request-comment" name="comment" placeholder="Комментарий" type="text"
											class="field__input"></textarea>
									</label>

									<div class="field field--upload">
										<input type="file" id="request-files" class="field__upload-input visually-hidden"
											multiple accept=".jpg,.jpeg,.png,.pdf">
										<label for="request-files" class="field__upload-preview">
											<img loading="lazy" height="40" width="40"
												src="<?php echo get_template_directory_uri(); ?>/images/icons/upload.svg"
												alt="">
											<div class="field__upload-preview-text">
												<span class="field__upload-preview-caption">
													<span class="c-main">Нажми для загрузки</span>
													или перенеси
												</span>
												<span class="field__upload-preview-requirement">JPG, JPEG, PNG, PDF вес
													до 10Мб (максимум 5 файлов)</span>
											</div>
										</label>
										<div class="field__upload-files calculator__upload-files">
											<ul class="field__upload-list"></ul>
											<button class="field__upload-files-btn">
												<img src="<?php echo get_template_directory_uri(); ?>/images/icons/plus.svg"
													alt="">
											</button>
										</div>
									</div>

									<button data-modal="request-success-calculator" type="submit"
										class="button calculator__form-button">
										<span>Отправить</span>
									</button>
								</div>
							</div>
						</div>

						<!-- Кнопка "Далее" -->
						<button class="calculator__next" type="button">
							<span>Далее</span>
							<img src="<?php echo get_template_directory_uri(); ?>/images/icons/arrow-down-right-bold.svg"
								height="12" width="12" alt="">
						</button>
					</form>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>