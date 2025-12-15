<?php
/**
 * Template part for the Payroll Two Column Section (Image Left, Hardcoded Text Right).
 * File: sections/section-payroll-two-column.php
 * ACF Layout Name: payroll_two_column
 * Framework: Bootstrap 4.6
 *
 * NOTE: The text content is now hardcoded in the $hardcoded_text variable.
 * The CSS is optimized for tighter spacing around the bullet points.
 */

// --- Dynamic Content Retrieval from ACF Flexible Content ---

// 1. Image retrieval remains dynamic
$image_field_value = get_sub_field( 'left_image' );

$image_url = '';
$image_alt = '';

// Define the custom dark blue color for styling
$blue_color = '#1C355E';

// Determine the correct image URL and Alt text based on ACF Return Format
if ( is_array( $image_field_value ) && isset( $image_field_value['url'] ) ) {
	$image_url = esc_url( $image_field_value['url'] );
	$image_alt = esc_attr( $image_field_value['alt'] );
} elseif ( is_numeric( $image_field_value ) ) {
	$image_url = wp_get_attachment_image_url( $image_field_value, 'large' );
	$image_alt = get_post_meta( $image_field_value, '_wp_attachment_image_alt', true );
} elseif ( is_string( $image_field_value ) ) {
	$image_url = esc_url( $image_field_value );
	$image_alt = 'Image for two-column section';
}


$hardcoded_text = '
    <h2 class="pt-5">Product Overview</h2>
    <p>Fully customisable, secure online platform built on trusted AWS infrastructure (ISO27001 and SOC 2 Type 1 certified).</p>
    <p>With NLC Payroll’s Employee Payment Portal, there is no need for you to load or validate payroll data – our portal handles the entire process.</p>
    <p>This end-to-end process is backed by our extensive experience in remediation and payroll compliance projects across New Zealand and Australia, having paid out more than $17 million to former employees so far.</p>

    <h4>THROUGH THE PORTAL PEOPLE CAN:</h4>
    <ul>
        <li>View what they’re owed and claim their payment</li>
        <li>Verify and update their personal information</li>
        <li>Confirm their bank account and tax details (IRD, TFN)</li>
        <li>Receive communication and payment updates in real time</li>
    </ul>

    <h4>THE PORTAL GIVES EMPLOYERS:</h4>
    <ul>
        <li>Validated payroll data outputs</li>
        <li>Automated tax and superannuation calculations</li>
        <li>Clear, transparent reporting on progress and payments</li>
    </ul>
';


// --- Section Markup ---
// Removed bg-white and py-5 (vertical padding)
$section_class = 'payroll-two-column-section';

// Only render the section if we have the hardcoded text or an image
if ( $hardcoded_text || $image_url ) :
	?>

<section class="<?php echo esc_attr( $section_class ); ?>" style="background-color: #f7f7f7;">
	<div class="container">
		<div class="row align-items-center">

			<div class="col-md-6 mb-md-0">
				<?php if ( $image_url ) : ?>
						<img src="<?php echo $image_url; ?>"
							 alt="<?php echo $image_alt; ?>"
							 class="img-fluid column-image text-center mb-0"
							 loading="lazy">
				<?php endif; ?>
			</div>

			<div class="col-md-6 text-justify pt-8">
				<style>
					/* Stylesheet for this specific section/layout */
					.payroll-two-column-section .custom-styled-text h2 {
						color: <?php echo $blue_color; ?>;
						font-weight: bold;
						font-size: 2rem;
						margin-bottom: 1rem;
					}
					.payroll-two-column-section .custom-styled-text h4 {
						color: <?php echo $blue_color; ?>;
						font-weight: 300;
						font-size: 1.2rem;
						margin-top: 1.5rem;
						margin-bottom: 0.5rem;
					}
					/* Styling list items for custom blue bullet points */
					.payroll-two-column-section .custom-styled-text ul {
						list-style: none;
						padding-left: 0;
						font-weight: 200;
					}
					.payroll-two-column-section .custom-styled-text p {
						list-style: none;
						padding-left: 0;
						font-size: 16px;
						line-height: 1.4;
						font-weight: 200;
					}
					/* Tighter Spacing - Default Desktop Style */
					.payroll-two-column-section .custom-styled-text li {
						margin-bottom: 0.5rem;
						padding-left: 2rem;
						text-indent: -0.8em;
						font-size: 16px;
						line-height: 1.4;
						font-weight: 200;
					}
					.payroll-two-column-section .custom-styled-text li:before {
						content: "• ";
						color: <?php echo $blue_color; ?>;
						font-weight: bold;
						display: inline-block;
						width: 0.8em;
					}

					@media (max-width: 767px) {
						.payroll-two-column-section .custom-styled-text li {
							padding-top: 3px;
							padding-right: 15px;
						}
					}
				</style>

				<div class="custom-styled-text">
					<?php
					echo $hardcoded_text;
					?>
				</div>
			</div>

		</div></div></section><?php endif; ?>
