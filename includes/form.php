<form action="<?php echo htmlspecialchars( $_SERVER['PHP_SELF'] ) ?>" method="POST">  
    <!-- the form action is pointing to the page we are on -->
    <!-- htmlspecialchars function makes page secure -->

    <label class="label-input">
        First Name
        <input type="text" name="firstName" value="<?php 
            if( isset($_POST['firstName']) ) echo htmlspecialchars( $_POST['firstName'] ); ?>">
                <!-- if isset post name is set, then show the post name -->
        <span class="form-err"><?php echo $firstNameErr; ?></span>
    </label>

    <label class="label-input">
        Last Name
        <input type="text" name="lastName" value="<?php 
            if( isset($_POST['lastName']) ) echo htmlspecialchars( $_POST['lastName'] ); ?>">
        <span class="form-err"><?php echo $lastNameErr; ?></span>
    </label>

    <label class="label-input">
        Email
        <input type="email" name="email" value="<?php 
            if( isset($_POST['email']) ) echo htmlspecialchars( $_POST['email'] ); ?>">
        <span class="form-err"><?php echo $emailErr; ?></span>
    </label>

    <fieldset class="form-box">
        <legend>Are you a returning customer?</legend>

        <label><input type="radio" name="returnCust" value="Yes"
                <?php if( isset($_POST['returnCust']) && $_POST['returnCust'] == 'Yes' ) echo 'checked="checked"'; ?>> Yes</label>

        <label><input type="radio" name="returnCust" value="No"
                <?php if( isset($_POST['returnCust']) && $_POST['returnCust'] == 'No' ) echo 'checked="checked"'; ?>> No</label>

        <span class="form-err"><?php echo $returnCustErr; ?></span>
    </fieldset>

    <fieldset class="form-box">
        <legend>What is your favorite type of tea?</legend>

        <label><input type="checkbox" name="teaTypes[]" value="Black"
            <?php if( isset($_POST['teaTypes']) && $_POST['teaTypes'] == 'Black' ) echo 'checked="checked"'; ?>> Black</label>

        <label><input type="checkbox" name="teaTypes[]" value="Green"
            <?php if( isset($_POST['teaTypes']) && $_POST['teaTypes'] == 'Green' ) echo 'checked="checked"'; ?>> Green</label>

        <label><input type="checkbox" name="teaTypes[]" value="Herbal (tisane)"
            <?php if( isset($_POST['teaTypes']) && $_POST['teaTypes'] == 'Herbal (tisane)' ) echo 'checked="checked"'; ?>> Herbal (tisane)</label>

        <label><input type="checkbox" name="teaTypes[]" value="I love all tea!"
            <?php if( isset($_POST['teaTypes']) && $_POST['teaTypes'] == 'I love all tea!' ) echo 'checked="checked"'; ?>> I love all tea!</label>

        <span class="form-err"><?php echo $teaTypesErr; ?></span>
    </fieldset>

    <label class="label-input">
        How did you hear about us?
        <select name="howHear">
            <option value="NULL" <?php 
                if( isset($_POST['howHear']) && $_POST == 'NULL' ) {
                    echo 'selected = "unselected"';
                } ?>>Select one
            </option>

            <option value="From a friend / word of mouth" <?php 
                if( isset($_POST['howHear']) && $_POST['howHear'] == 'From a friend / word of mouth' ) {
                    echo 'selected = "selected"';
                } ?>>From a friend / word of mouth
            </option>

            <option value="An internet ad" <?php 
                if( isset($_POST['howHear']) && $_POST['howHear'] == 'An internet ad' ) {
                    echo 'selected = "selected"';
                } ?>>An internet ad
            </option>

            <option value="An internet search" <?php 
                if( isset($_POST['howHear']) && $_POST['howHear'] == 'An internet search' ) {
                    echo 'selected = "selected"';
                } ?>>An internet search
            </option>

            <option value="A paper flier" <?php 
                if( isset($_POST['howHear']) && $_POST['howHear'] == 'A paper flier' ) {
                    echo 'selected = "selected"';
                } ?>>A paper flier
            </option>

            <option value="Social media" <?php 
                if( isset($_POST['howHear']) && $_POST['howHear'] == 'Social media' ) {
                    echo 'selected = "selected"';
                } ?>>Social media
            </option>
        </select>
        <span class="form-err"><?php echo $howHearErr; ?></span>
    </label>

    <label class="label-input">
        Comments
        <textarea name="comments"><?php if( isset($_POST['comments']) ) echo htmlspecialchars( $_POST['comments'] ); ?></textarea>
        <span class="form-err"><?php echo $commentsErr; ?></span>
    </label>

    <label class="label-input">
        <input type="radio" name="privacy" value="<?php 
                if( isset($_POST['privacy']) ) echo htmlspecialchars( $_POST['privacy'] ); ?>"> I agree to your privacy policy
        <span class="form-err"><?php echo $privacyErr; ?></span>
    </label>

    <input type="submit" value="Send" /> 

    <button class="button" type="button" onclick="window.location.href = '<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>'">Reset</button>
    
</form> 