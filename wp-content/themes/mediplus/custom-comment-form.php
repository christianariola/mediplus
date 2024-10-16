<?php
    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
        if(isset($_POST["comment_nonce"]) && wp_verify_nonce($_POST["comment_nonce"], 'custom_comment_nonce')) {
            $comment_data = [
                'comment_post_ID' => get_the_ID(),
                'comment_author' => sanitize_text_field($_POST['first-name']) . " " . sanitize_text_field($_POST['last-name']),
                'comment_author_email' => sanitize_text_field($_POST['email']),
                'comment_content' => sanitize_text_field($_POST['message']),
            ];
            $comment_id = wp_insert_comment($comment_data);

            if($comment_id) {
                $redirect_url = esc_url(get_permalink()) . "#comment-" . $comment_id;
                wp_safe_redirect($redirect_url);
            } else {
                echo 'Failed to submit comment.' . esc_html($comment_id->get_error_message());
            } 
        } else {
            echo 'Security check failed. Please try again.';
        }
    }
?>
<div class="comments-form">
    <h2>Leave Comments</h2>
    <!-- Contact Form -->
    <form class="form" method="post" action="<?php echo esc_url(get_comment_link()); ?>">
        <?php
            comment_id_fields();
            wp_nonce_field('custom_comment_nonce', 'comment_nonce');
        ?>
        <div class="row">
            <div class="col-lg-4 col-md-4 col-12">
                <div class="form-group">
                    <i class="fa fa-user"></i>
                    <input type="text" name="first-name" placeholder="First name" required="required">
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-12">
                <div class="form-group">
                    <i class="fa fa-envelope"></i>
                    <input type="text" name="last-name" placeholder="Last name" required="required">
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-12">
                <div class="form-group">
                    <i class="fa fa-envelope"></i>
                    <input type="email" name="email" placeholder="Your Email" required="required">
                </div>
            </div>
            <div class="col-12">
                <div class="form-group message">
                    <i class="fa fa-pencil"></i>
                    <textarea name="message" rows="7" placeholder="Type Your Message Here"></textarea>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group button">
                    <button type="submit" name="submit" class="btn primary"><i class="fa fa-send"></i>Submit
                        Comment</button>
                </div>
            </div>
        </div>
    </form>
    <!--/ End Contact Form -->
</div>