
    <div class="contact">
        
        <?php if(!empty($errors)): ?>
        <div class="panel">
            <ul><li><?php echo implode('</li><li>',$errors); ?></li></ul>
        </div>
        <?php endif; ?>
        
        <?php if(!empty($succeed)): ?>
        <div class="panelsucceed">
            <?php echo $succeed;?>
        </div>
        <?php endif; ?>
        
        
        <form action="controllers/Controller-contact.php" method="post">
            <label>
                Your name *
                <input type="text" name="name" autocomplete="off" <?php echo isset($fields['name']) ? ' value="' . e($fields['name']) . '" ' : ''  ?>>
            </label>
            <label>
                Your email *
                <input type="text" name="email" autocomplete="off" <?php echo isset($fields['email']) ? ' value="' . e($fields['email']) . '" ' : ''  ?>>
            </label>
            <label>
                Your message *
                <textarea name="message" rows="8"><?php echo isset($fields['message']) ? e($fields['message'])  : ''  ?></textarea>
            </label>
            <input type="submit" value="Send">
            
            <p class="note">* mean required</p>
        </form>
        
    </div>


