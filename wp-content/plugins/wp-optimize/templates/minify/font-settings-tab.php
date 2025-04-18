<?php if (!defined('WPO_VERSION'))  die('No direct access allowed'); ?>
<div class="wpo_section wpo_group">
	<form>
		<div id="wpo_settings_warnings"></div>
		<h3><?php esc_html_e('Google Fonts', 'wp-optimize'); ?></h3>
		<div class="wpo-fieldgroup">
			<fieldset>
				<label for="disable_google_fonts_processing">
					<input
						name="disable_google_fonts_processing"
						type="checkbox"
						id="disable_google_fonts_processing"
						value="1"
						<?php echo checked($wpo_minify_options['disable_google_fonts_processing']); ?>
					>
					<?php esc_html_e('Disable Google Fonts processing', 'wp-optimize'); ?>
					<span tabindex="0" data-tooltip="<?php esc_attr_e('If enabled, stylesheets from Google Fonts will bypass WP-Optimize processing, allowing standard WordPress processing to be used instead.', 'wp-optimize');?> <?php esc_attr_e('This can be helpful if you are using other plugins that work with Google Fonts and experience conflicts with WP-Optimize.', 'wp-optimize');?>"><span class="dashicons dashicons-editor-help"></span></span>
				</label>
				<?php if (WP_OPTIMIZE_SHOW_MINIFY_ADVANCED) : ?>
					<label for="merge_google_fonts">
						<input
							name="merge_google_fonts"
							type="checkbox"
							id="merge_google_fonts"
							class="google_fonts_option"
							value="1"
							<?php echo checked($wpo_minify_options['merge_google_fonts']); ?>
						>
						<?php esc_html_e('Merge fonts from Google Fonts into one request', 'wp-optimize'); ?>
						<span tabindex="0" data-tooltip="<?php esc_attr_e('This improves speed when loading multiple fonts from Google Fonts.', 'wp-optimize');?>"><span class="dashicons dashicons-editor-help"></span></span>
					</label>
				<?php endif; ?>
				<label for="remove_googlefonts">
					<input
						name="remove_googlefonts"
						type="checkbox"
						id="remove_googlefonts"
						class="google_fonts_option"
						value="1"
						<?php echo checked($wpo_minify_options['remove_googlefonts']); ?>
					>
					<?php esc_html_e('Do not load Google Fonts', 'wp-optimize'); ?>
					<span tabindex="0" data-tooltip="<?php esc_attr_e('If enabled, stylesheets from Google Fonts will not be loaded on the site and system fallback fonts will be used instead.', 'wp-optimize');?>"><span class="dashicons dashicons-editor-help"></span></span>
				</label>
				<label for="enable_display_swap">
					<input
						name="enable_display_swap"
						type="checkbox"
						id="enable_display_swap"
						class="google_fonts_option"
						value="1"
						<?php echo checked($wpo_minify_options['enable_display_swap']); ?>
					>
					<?php esc_html_e('Add "display=swap" to Google Fonts requests', 'wp-optimize'); ?>
					<span tabindex="0" data-tooltip="<?php esc_attr_e('This feature of Google Fonts is encouraged for better accessibility, but may result in a visible font change.', 'wp-optimize'); ?>"><span class="dashicons dashicons-editor-help"></span></span>
				</label>
			</fieldset>
			<p class="wpo_min-bold-green wpo_min-rowintro">
				<?php esc_html_e('Choose how to include fonts from Google Fonts on your pages, when available:', 'wp-optimize'); ?>
			</p>
			<fieldset>
			<label>
					<input
						type="radio"
						class="google_fonts_option"
						name="gfonts_method"
						value="inherit"
						<?php echo checked('inherit' === $wpo_minify_options['gfonts_method']); ?>
					>
					<?php esc_html_e('Inherit from the CSS settings', 'wp-optimize'); ?>
					<span tabindex="0" data-tooltip="<?php esc_attr_e('The stylesheets will be merged or inlined.', 'wp-optimize');?>"><span class="dashicons dashicons-editor-help"></span></span>
				</label>
				<label>
					<input
						type="radio"
						class="google_fonts_option"
						name="gfonts_method"
						value="inline"
						<?php echo checked('inline' === $wpo_minify_options['gfonts_method']); ?>
					>
					<?php esc_html_e('Inline google font CSS files', 'wp-optimize'); ?>
					<span tabindex="0" data-tooltip="<?php esc_attr_e('The stylesheets will be inlined.', 'wp-optimize');?>"><span class="dashicons dashicons-editor-help"></span></span>
				</label>
				<label>
					<input
						type="radio"
						class="google_fonts_option"
						name="gfonts_method"
						value="async"
						<?php echo checked('async' === $wpo_minify_options['gfonts_method']); ?>
					>
						<?php esc_html_e('Asynchronously load CSS files from Google Fonts', 'wp-optimize'); ?>
						<span tabindex="0" data-tooltip="<?php esc_attr_e('Will use \'preload\' with LoadCSS polyfill', 'wp-optimize');?>"><span class="dashicons dashicons-editor-help"></span></span>
				</label>
				<label>
					<input
						type="radio"
						class="google_fonts_option"
						name="gfonts_method"
						value="exclude"
						<?php echo checked('exclude' === $wpo_minify_options['gfonts_method']); ?>
					>
					<?php esc_html_e('Asynchronously load fonts from Google Fonts using JavaScript', 'wp-optimize'); ?>
					<span tabindex="0" data-tooltip="<?php esc_attr_e('Use if you want to exclude the CSS from Google Fonts from performance tests.', 'wp-optimize');?>"><span class="dashicons dashicons-editor-help"></span></span>
				</label>
			</fieldset>
		</div>

		<h3><?php esc_html_e('Font Awesome', 'wp-optimize'); ?></h3>
		<div class="wpo-fieldgroup">
			<p class="wpo_min-bold-green wpo_min-rowintro">
				<?php esc_html_e('Choose how to include Font Awesome (only available if it has \'font-awesome\' in the url):', 'wp-optimize'); ?>
			</p>
			<fieldset>
				<label><input
					type="radio"
					name="fawesome_method"
					value="inherit"
					<?php echo checked('inherit' === $wpo_minify_options['fawesome_method']); ?>
					>
					<?php esc_html_e('Inherit from the CSS settings', 'wp-optimize'); ?>
					<span tabindex="0" data-tooltip="<?php esc_attr_e('The stylesheets will be merged or inlined.', 'wp-optimize');?>"><span class="dashicons dashicons-editor-help"></span></span>
				</label>
				<label><input
					type="radio"
					name="fawesome_method"
					value="inline"
					<?php echo checked('inline' === $wpo_minify_options['fawesome_method']); ?>
					>
					<?php esc_html_e('Inline the Font Awesome CSS file', 'wp-optimize'); ?>
				</label>
				<label>
					<input
						type="radio"
						name="fawesome_method"
						value="async"
						<?php echo checked('async' === $wpo_minify_options['fawesome_method']); ?>
					>
					<?php esc_html_e('Asynchronously load the Font Awesome CSS file', 'wp-optimize'); ?>
					<span tabindex="0" data-tooltip="<?php esc_attr_e('Will use \'preload\' with LoadCSS polyfill', 'wp-optimize');?>"><span class="dashicons dashicons-editor-help"></span></span>
				</label>
				<label><input
					type="radio"
					name="fawesome_method"
					value="exclude"
					<?php echo checked('exclude' === $wpo_minify_options['fawesome_method']); ?>
				>
				<?php esc_html_e('Asynchronously load the Font Awesome stylesheet using JavaScript', 'wp-optimize'); ?>
				<span tabindex="0" data-tooltip="<?php esc_attr_e('Use if you want to exclude Font Awesome from page speed tests (PageSpeed Insights, GTMetrix...)', 'wp-optimize');?>"><span class="dashicons dashicons-editor-help"></span></span>
			</label>
			</fieldset>
		</div>

		<p class="submit">
			<input
				class="wp-optimize-save-minify-settings button button-primary"
				type="submit"
				value="<?php esc_attr_e('Save settings', 'wp-optimize'); ?>"
			>
			<img class="wpo_spinner" src="<?php echo esc_url(admin_url('images/spinner-2x.gif')); // phpcs:ignore PluginCheck.CodeAnalysis.ImageFunctions.NonEnqueuedImage -- N/A ?>" alt="...">
			<span class="save-done dashicons dashicons-yes display-none"></span>
		</p>
	</form>
</div>
