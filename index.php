<?php
    $data = array_map('trim', $_POST);
    $errors = [];

    if($data['firstname'] == ""){
        $errors['firstname'] = "Ce champ est obligatoire";
    }

    if($data['lastname'] == ""){
        $errors['lastname'] = "Ce champ est obligatoire";
    }
    
    if(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)){
        $errors['email'] = "L'email n'est pas au bon format";
    }

    if($data['email'] == ""){
        $errors['email'] = "Ce champ est obligatoire";
    }    
    
    if(intval($data['age']) < 18){
        $errors['age'] = "Vous êtes trop jeune";
    }
    
    if($data['age'] == ""){
        $errors['age'] = "Ce champ est obligatoire";
    }

    $status = count($errors) == 0 ? "Votre profile est enregistré" : "Enregistrer mon profile";
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">    
    
    <link rel="stylesheet" href="/style.css">
    
    <title>Validation de formulaire</title>
</head>
<body>
    <main>
        <h1>Mon profile</h1>

        <form action="" method="POST">
            <div class="field">
                <label for="firstname">Prénom</label>
                <input type="text" id="firstname" name="firstname" value="<?= $_POST['firstname'] ?>" required>
                <?php if(isset($errors['firstname'])) : ?>  
                    <div class="error"><?= $errors['firstname']; ?></div>
                <?php endif; ?>
            </div>
            
            <div class="field">
                <label for="lasttname">Nom</label>
                <input type="text" id="age" name="lastname" value="<?= $_POST['lastname'] ?>" required>
                <?php if(isset($errors['lastname'])) : ?>  
                    <div class="error"><?= $errors['lastname']; ?></div>
                <?php endif; ?>
            </div>
            
            <div class="field">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="<?= $_POST['email'] ?>" required>
                <?php if(isset($errors['email'])) : ?>  
                    <div class="error"><?= $errors['email']; ?></div>
                <?php endif; ?>                
            </div>
            
            <div class="field">
                <label for="age">Age</label>
                <input type="number" id="age" name="age" value="<?= $_POST['age'] ?>" required min=18>
                <?php if(isset($errors['age'])) : ?>  
                    <div class="error"><?= $errors['age']; ?></div>
                <?php endif; ?>                
            </div>

            <div class="field submit">
                <input type="submit" value="<?= $status ?>">
            </div>
        </form>

    </main>
</body>
</html>