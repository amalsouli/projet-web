<?php
    include_once 'A:/jj/htdocs/TEST/rendez.php';
    include_once 'A:/jj/htdocs/TEST/rendezc.php';

    $error = "";

    // create adherent
    $rendez = null;

    // create an instance of the controller
    $rendezc = new rendezc();
    if (
        isset($_POST["ID"]) &&
		isset($_POST["Dates"]) &&		
        isset($_POST["Temps"]) &&
		isset($_POST["Soin"]) && 
        isset($_POST["Durée"]) 
      
    ) {
        if (
            !empty($_POST["ID"]) && 
			!empty($_POST['Dates']) &&
            !empty($_POST["Temps"]) && 
			!empty($_POST["Soin"]) && 
            !empty($_POST["Durée"]) 
       
        ) {
            $rendez = new rendez(
                $_POST['ID'],
				$_POST['Dates'],
                $_POST['Temps'], 
				$_POST['Soin'],
                $_POST['Durée']
              
            );
            $rendezc->ajouterrendez($rendez);
            header('Location:connection.php');
        }
        else
            $error = "Missing information";
    }

    
?>
<div class="contactez-nous">
    <h1>Rendez-vous</h1>
    <p>Pour avoir un rendez vous dans notre center il vous faut terminer le formulaire  !</p>
    <form action="ajouterRendez.php" method="post">
    <div>
    
    <br>
    <label for="start">choisissez la date:</label>
    <label>mettre votre ID<input type="text" id="Utilisateur" name="ID" /></label>

<input type="date" id="start" name="Dates"
       value="2022-05-1"
       min="2022-01-01" max="2022-12-31">

    <br>
    <label for="appt">Choisissez le temps du rendez vous:</label>

<input type="time" id="appt" name="Temps">

<small>les heurs de travail 9am to 6pm</small>

    <div>
        <label for="sujet">Choisissez le soin </label>
<select name="Soin" id="soin" required>
<option value=" soin1">soin 1 20dt</option>
<option value="soin 2">soin 2 30dt</option>
<option value="soin 3">soin 3 50dt</option>
<option value="soin 4">soin 4 55dt</option>
<option value="soin 5">soin 5 60dt</option>
</select>
    
    </select>
    </div>
    <label for="appt-time">Veuillez choisir le durée du rendez-vous :</label>
<input id="appt-time" type="text" name="Durée" >    

    
<hr>
    <input type="submit"value ="ajouter mon rendez-vous">
    

    </form>
    </div>
    <style> body {
        background: #FFD9D9;
        font-family: Montserrat, "sans-serif";
        display: flex;
        justify-content: center;
        color: #303030;
        }
        
        .contactez-nous {
        width: 700px;
        border: 1px solid;
        border-radius: 8px;
        padding: 0 50px 0 50px;
        background: white;
        }
        
        .contactez-nous > h1 {
        font-weight: 500;
        }
        
        .contactez-nous > p {
        font-weight: 300;
        }
        
        form div {
        width: 100%;
        display: flex;
        flex-direction: column;
        min-height: 83px;
        margin-top: 25px;
        }
        
        form div > label {
        margin-bottom: 7px;
        font-weight: 600;
        }
        
        form div > input, form div > select, form div > textarea {
        background: #FFD9D9;
        border: none;
        border-radius: 5px;
        font-size: 16px;
        font-weight: 500;
        font-family: Montserrat, "sans-serif";
        box-shadow: 0px 2px 2px 0px rgba(0,0,0,0.25);
        }
        
        form div > input, form div > select {
        height: 50px;
        padding-left: 10px;
        }
        
        form div > select {
        appearance: none;
        background-size: 15px;
        background-image: url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZlcnNpb249IjEuMSIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHhtbG5zOnN2Z2pzPSJodHRwOi8vc3ZnanMuY29tL3N2Z2pzIiB3aWR0aD0iNTEyIiBoZWlnaHQ9IjUxMiIgeD0iMCIgeT0iMCIgdmlld0JveD0iMCAwIDIxMy4zMzMgMjEzLjMzMyIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgNTEyIDUxMiIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSIgY2xhc3M9IiI+PGc+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+Cgk8Zz4KCQk8cG9seWdvbiBwb2ludHM9IjAsNTMuMzMzIDEwNi42NjcsMTYwIDIxMy4zMzMsNTMuMzMzICAgIiBmaWxsPSIjMzAzMDMwIiBkYXRhLW9yaWdpbmFsPSIjMDAwMDAwIiBzdHlsZT0iIiBjbGFzcz0iIj48L3BvbHlnb24+Cgk8L2c+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPC9nPjwvc3ZnPg==');
        background-position: right 10px top 50%;
        background-repeat: no-repeat;
        }
        
        form div > textarea {
        height: 195px;
        padding: 15px 0px 0px 10px;
        }
        
        form div > input::placeholder, form div > textarea::placeholder {
        color: white;
        }
        
        form div > select:invalid {
        color: white;
        }
        
        form div > select option {
        background: white;
        color: #303030;
        }
        
        form div:last-child {
        align-items:center;
        margin-top: 20px;
        }
        
        form button {
        width: 450px;
        max-width: 500px;
        height: 60px;
        font-weight: 700;
        font-size: 28px;
        background: white;
        border: rgba(48, 48, 48, 0.5) solid 1px;
        border-radius: 5px;
        box-shadow: 0px 4px 4px 0px rgba(0,0,0,0.25);
        color: #303030;
        } </style>