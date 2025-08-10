<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package bumague
 */

get_header();
?>

<main class="content">
	<section class="section section--decoration-cells">
		<div class="section__body">
			<div class="service-hero container">
				<?php
				$service_imgs = get_field('service_imgs');

				if ($service_imgs):
					?>
					<div class="service-hero__gallery">
						<div class="service-hero__gallery-slider swiper">
							<div class="service-hero__gallery-slider-wrapper swiper-wrapper">
								<?php foreach ($service_imgs as $image): ?>

									<div class="service-hero__gallery-slider-item swiper-slide">
										<div style="background-image: url(<?php echo $image; ?>);"
											class="service-hero__gallery-img"></div>
									</div>
								<?php endforeach; ?>
							</div>
						</div>
						<div class="service-hero__gallery-slider-pagination swiper-pagination"></div>
					</div>
				<?php endif; ?>

				<div class="service-hero__content">
					<header class="service-hero__header">
						<?php if (get_field('service_title')): ?>
							<h1 class="service-hero__title"><?php the_field('service_title'); ?></h1>
						<?php endif; ?>

						<?php if (get_field('service_description')): ?>
							<div class="section__description service-hero__description">
								<?php the_field('service_description'); ?>
							</div>
						<?php endif; ?>
					</header>

					<?php if (have_rows('service_features')): ?>
						<div class="service-hero__features">
							<ul class="service-hero__features-list">
								<?php
								while (have_rows('service_features')):
									the_row();
									$feature = get_sub_field('service_f_group');
									$size = $feature['service_f_columns'];
									$size_class = '';

									// Определяем класс размера в зависимости от выбранного варианта
									switch ($size) {
										case 'Половина':
											$size_class = 'service-hero__features-item--3';
											break;
										case 'Две трети':
											$size_class = 'service-hero__features-item--4';
											break;
										case 'Максимально':
											$size_class = 'service-hero__features-item--6';
											break;
										default:
											$size_class = '';
									}
									?>
									<li class="service-hero__features-item <?php echo $size_class; ?>">
										<div class="quality-item service-hero__features-quality">
											<?php if ($feature['service_f_title']): ?>
												<h3 class="quality-item__title">
													<?php echo $feature['service_f_title']; ?>
												</h3>
											<?php endif; ?>

											<?php if ($feature['service_f_description']): ?>
												<div class="quality-item__description">
													<p><?php echo $feature['service_f_description']; ?></p>
												</div>
											<?php endif; ?>
										</div>
									</li>
								<?php endwhile; ?>
							</ul>
						</div>
					<?php endif; ?>
				</div>

				<div class="service-hero__buttons">
					<button data-modal="quick-request-window" class="button button--accent" type="button">
						<div class="button__decoration">
							<svg class="button__decoration-icon" width="62" height="101" viewBox="0 0 62 101"
								fill="none" xmlns="http://www.w3.org/2000/svg">
								<path
									d="M8.65564 59.4161C4.67511 54.3394 5.50472 47.3786 6.41709 44.5328C7.71901 51.0981 9.31473 51.6982 15.4898 55.362C20.4299 58.2931 21.6524 62.7286 21.6461 64.58C24.6174 62.6159 26.0486 55.967 20.3723 52.7644C14.696 49.5617 8.70886 44.7912 13.3888 34.2391C17.1328 25.7974 10.7743 15.6622 7.127 11.6499C13.675 14.8833 19.2219 25.3933 20.0431 32.3594C20.8644 39.3255 20.2546 40.8722 30.0507 46.6186C39.8468 52.3651 32.5366 71.9935 35.375 73.4675C38.2133 74.9415 42.3081 74.7914 42.0275 66.6997C41.7468 58.608 39.4044 59.3781 34.0907 50.0439C29.8398 42.5766 32.7843 34.212 34.7879 30.9631C33.891 34.315 33.1717 41.7122 37.4695 44.4855C41.7672 47.2588 46.9407 53.2158 48.9903 55.8477C48.4684 49.1074 45.3458 44.1457 43.8497 42.5074C50.5313 47.9549 59.8128 62.9182 56.7531 77.019C53.6935 91.1198 39.7729 97.6994 23.9767 95.0778C8.18058 92.4562 6.95804 85.2642 10.765 75.4453C14.5719 65.6264 13.6313 65.762 8.65564 59.4161Z"
									fill="#D20000" stroke="#900000" stroke-linejoin="round" />
								<path
									d="M30.593 14.4323C25.9063 9.90297 28.2237 3.59767 29.9683 1.01119C29.6673 5.39917 31.3383 7.91938 36.1783 13.3247C40.0503 17.6489 37.499 22.3813 35.7393 24.207C35.9767 22.836 35.2797 18.9616 30.593 14.4323Z"
									fill="url(#paint0_linear_272_47112)" stroke="#900000" stroke-linejoin="round" />
								<path
									d="M16.6195 31.7158C16.6387 31.772 16.6549 31.8525 16.6664 31.9591C17.0632 34.0846 17.2933 37.0513 16.4681 40.4533C15.5885 44.0797 18.5128 46.0565 20.1112 47.0125C17.8817 46.6399 13.791 44.6199 15.2648 39.5207C16.5649 35.0223 16.7519 32.7578 16.6664 31.9591C16.651 31.8767 16.6353 31.7956 16.6195 31.7158Z"
									fill="#FF7300" />
								<path
									d="M11.2924 58.333C7.98881 56.2588 6.97218 52.5531 6.87682 50.9595C7.34318 53.3112 9.81409 55.8425 10.9913 56.8142C15.7972 60.3015 16.767 63.0863 16.6512 64.0429C16.2415 63.0039 14.5961 60.4073 11.2924 58.333Z"
									fill="#FF7300" />
								<path
									d="M33.5574 40.6797C33.4913 43.171 34.4319 48.6842 38.7228 50.8071C37.3239 49.6587 34.3324 46.0255 33.5574 40.6797Z"
									fill="#FF7300" />
								<path
									d="M16.7615 84.9055C12.4256 81.5288 14.271 74.4005 15.7356 71.2585C16.9293 74.111 20.3979 79.9784 24.7226 80.628C29.0473 81.2777 28.925 78.6235 28.3232 77.2152C26.8499 75.6063 24.4252 70.7574 26.5125 64.233C28.5999 57.7085 27.0101 53.4748 25.9543 52.1736C31.4641 55.3074 30.4397 64.7781 29.588 70.4974C28.7362 76.2167 32.2611 83.2068 41.2587 80.0476C48.4567 77.5203 46.8063 65.9966 45.0814 60.5507C49.4901 67.3756 48.5949 76.4711 47.5963 80.1657C52.0182 78.8407 53.7678 71.9996 54.0898 68.7447C56.2775 72.792 55.8184 77.9751 55.3154 80.0607C51.0252 91.9104 37.9555 95.317 31.9569 95.539C28.6984 93.4015 21.0975 88.2823 16.7615 84.9055Z"
									fill="#FF7300" />
								<path
									d="M34.0232 90.953C32.8685 87.8008 27.9701 86.5351 25.6652 86.2962C29.6055 84.8529 33.139 86.4945 36.9167 88.5969C40.6738 90.6879 41.0051 90.2347 43.964 86.1873L44.0128 86.1204C46.4162 82.833 49.0996 82.4129 50.1409 82.6137C46.2187 85.021 45.5917 89.0323 45.8558 91.3053C45.8558 91.3053 40.8745 94.4318 37.2789 94.7884C33.6833 95.145 35.1778 94.1052 34.0232 90.953Z"
									fill="#FFD500" />
								<defs>
									<linearGradient id="paint0_linear_272_47112" x1="30.5674" y1="0.892393" x2="35.2116"
										y2="24.3116" gradientUnits="userSpaceOnUse">
										<stop stop-color="#D20000" />
										<stop offset="1" stop-color="#FF7300" />
									</linearGradient>
								</defs>
							</svg>
						</div>
						<span>Быстрый заказ</span>

						<div class="button__decoration">
							<svg class="button__decoration-icon" width="33" height="53" viewBox="0 0 33 53" fill="none"
								xmlns="http://www.w3.org/2000/svg">
								<path
									d="M27.8531 31.3917C29.9393 28.7309 29.5045 25.0826 29.0263 23.5911C28.344 27.0321 27.5077 27.3466 24.2712 29.2669C21.682 30.8031 21.0413 33.1278 21.0446 34.0982C19.4873 33.0687 18.7372 29.5839 21.7122 27.9054C24.6872 26.2268 27.8252 23.7266 25.3724 18.1961C23.4101 13.7716 26.7427 8.45964 28.6543 6.35669C25.2223 8.05139 22.3152 13.5598 21.8847 17.2109C21.4543 20.8619 21.7739 21.6725 16.6396 24.6843C11.5054 27.6961 15.3367 37.9837 13.8491 38.7562C12.3615 39.5287 10.2153 39.4501 10.3624 35.2091C10.5095 30.9681 11.7372 31.3717 14.5222 26.4796C16.7502 22.5658 15.2069 18.1818 14.1568 16.479C14.6268 18.2358 15.0038 22.1128 12.7513 23.5663C10.4988 25.0198 7.78731 28.142 6.71312 29.5214C6.98665 25.9887 8.62326 23.3882 9.40737 22.5295C5.90546 25.3847 1.04089 33.2272 2.64449 40.6176C4.2481 48.008 11.5441 51.4565 19.8231 50.0825C28.1021 48.7085 28.7428 44.939 26.7476 39.7928C24.7523 34.6466 25.2453 34.7177 27.8531 31.3917Z"
									fill="#D20000" stroke="#900000" stroke-width="0.524114" stroke-linejoin="round" />
								<path
									d="M16.3554 7.81477C18.8118 5.44088 17.5971 2.13619 16.6828 0.780573C16.8405 3.08037 15.9648 4.40126 13.428 7.23426C11.3987 9.50066 12.7358 11.981 13.6581 12.9378C13.5337 12.2193 13.899 10.1887 16.3554 7.81477Z"
									fill="url(#paint0_linear_272_47122)" stroke="#900000" stroke-width="0.524114"
									stroke-linejoin="round" />
								<path
									d="M23.679 16.8729C23.669 16.9024 23.6605 16.9446 23.6545 17.0005C23.4465 18.1145 23.3259 19.6694 23.7584 21.4524C24.2194 23.3531 22.6867 24.3891 21.849 24.8902C23.0175 24.6949 25.1615 23.6362 24.3891 20.9636C23.7077 18.6059 23.6097 17.4191 23.6545 17.0005C23.6626 16.9573 23.6707 16.9148 23.679 16.8729Z"
									fill="#FF7300" />
								<path
									d="M26.4711 30.8236C28.2026 29.7364 28.7354 27.7942 28.7854 26.959C28.541 28.1915 27.2459 29.5182 26.629 30.0275C24.1101 31.8552 23.6018 33.3148 23.6625 33.8162C23.8772 33.2716 24.7396 31.9107 26.4711 30.8236Z"
									fill="#FF7300" />
								<path
									d="M14.8017 21.57C14.8363 22.8757 14.3434 25.7652 12.0944 26.8778C12.8276 26.276 14.3955 24.3718 14.8017 21.57Z"
									fill="#FF7300" />
								<path
									d="M23.6046 44.7492C25.8771 42.9794 24.91 39.2434 24.1423 37.5966C23.5167 39.0916 21.6988 42.1668 19.4321 42.5073C17.1655 42.8478 17.2296 41.4567 17.545 40.7186C18.3172 39.8753 19.588 37.334 18.494 33.9144C17.4 30.4949 18.2332 28.2759 18.7866 27.5939C15.8988 29.2364 16.4357 34.2001 16.8821 37.1977C17.3285 40.1953 15.4811 43.8589 10.7653 42.2031C6.99271 40.8785 7.85771 34.8388 8.76179 31.9845C6.45113 35.5615 6.92028 40.3286 7.44369 42.265C5.12607 41.5705 4.2091 37.985 4.04032 36.2791C2.89375 38.4003 3.13434 41.1169 3.39796 42.21C5.64653 48.4206 12.4966 50.206 15.6405 50.3224C17.3483 49.2021 21.3321 46.519 23.6046 44.7492Z"
									fill="#FF7300" />
								<path
									d="M14.5576 47.9195C15.1628 46.2674 17.7301 45.604 18.9381 45.4789C16.873 44.7224 15.021 45.5828 13.041 46.6847C11.0719 47.7806 10.8982 47.5431 9.34748 45.4218L9.32186 45.3867C8.06223 43.6637 6.65583 43.4435 6.11008 43.5488C8.16576 44.8105 8.49434 46.9129 8.35595 48.1042C8.35595 48.1042 10.9667 49.7428 12.8512 49.9297C14.7357 50.1166 13.9524 49.5716 14.5576 47.9195Z"
									fill="#FFD500" />
								<defs>
									<linearGradient id="paint0_linear_272_47122" x1="16.3688" y1="0.718309" x2="13.9347"
										y2="12.9927" gradientUnits="userSpaceOnUse">
										<stop stop-color="#D20000" />
										<stop offset="1" stop-color="#FF7300" />
									</linearGradient>
								</defs>
							</svg>
						</div>
					</button>
					<button data-service="<?php echo get_the_title() ?>" data-modal="request-window" type="button"
						class="button">
						<span>Заказать самостоятельно</span>
					</button>
				</div>
			</div>
		</div>
	</section>

	<?php get_template_part('template-parts/sections/calculator'); ?>

	<?php set_query_var('service_features_title', get_the_title()); ?>
	<?php get_template_part('template-parts/sections/service-features'); ?>

	<?php get_template_part('template-parts/sections/prices'); ?>
	<?php get_template_part('template-parts/sections/projects'); ?>
	<?php get_template_part('template-parts/sections/hero'); ?>
	<?php get_template_part('template-parts/sections/work-steps'); ?>
	<?php get_template_part('template-parts/sections/reviews'); ?>
	<?php get_template_part('template-parts/sections/common-services'); ?>
	<?php get_template_part('template-parts/sections/faq'); ?>
	<?php get_template_part('template-parts/sections/contacts'); ?>
</main>


<script src="<?php echo get_template_directory_uri(); ?>/js/calculator.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/prices.js"></script>

<?php get_footer(); ?>