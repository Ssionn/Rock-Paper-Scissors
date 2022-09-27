<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>RPS vs-COM</title>
</head>

<body class="bg-slate-900">
    <header>
        <div class="w-screen">
            <h1 class="text-4xl font-bold text-white flex justify-center items-center mt-[60px]">Rock Paper Scissors</h1>
        </div>
    </header>

    <?php
    session_start();
    if (!isset($_POST['keuze'])) {
    ?>
        <form method="post" class="flex flex-col items-center">
            <label for="keuze" class="pt-[40px] pb-[50px] text-white">Kies een optie:</label>
            <select id="keuze" name="keuze" class="w-28 border-b-2 border-black mb-4">
                <option value="steen">Steen</option>
                <option value="papier">Papier</option>
                <option value="schaar">Schaar</option>
            </select>
            <br><br>
            <input type="submit" value="Selecteren" class="cursor-pointer bg-blue-700 hover:bg-blue-500 text-white py-2 px-2 rounded" id="btnSubmit1"></input>
        </form>
        <div class="flex flex-col items-center mt-5">
            <a href="index.html">
                <button value="Main Menu" id="btnSubmit3" class="bg-blue-700 hover:bg-blue-500 text-white py-2 px-3 rounded">Main Menu</button>
            </a>
        </div>
    <?php
    }
    if (isset($_POST['keuze'])) {
        $_SESSION['keuze'] = $_POST['keuze'];
        $speler1 = $_SESSION['keuze'];
        $objects = ["steen", "papier", "schaar"];
        $mixthem = array_rand($objects, 1);
        $CPU = $objects[$mixthem];

        function battle($speler1, $CPU)
        {
            if ($speler1 === $CPU) {
                return "Gelijkspel!";
            } elseif (($speler1 == "steen" && $CPU == "schaar") || ($speler1 == "papier" && $CPU == "steen") || ($speler1 == "schaar" && $CPU == "papier")) {
                return "Player 1 wint!";
            } else {
                return "CPU wint!";
            }
        }

    ?>
        <h2 class="text-lg text-white underline flex justify-center mt-10 pb-5"> <?= battle($speler1, $CPU) ?> </h2>
        <h3 class="text-md text-white flex justify-center pb-5">Player 1 had <?= $speler1 ?> gekozen!</h3>
        <h3 class="text-md text-white flex justify-center pb-5">COM had <?= $CPU ?> gekozen!</h3>

        <div class="flex flex-col items-center mt-5">
            <a href="index.html">
                <button value="Main Menu" id="btnSubmit3" class="bg-blue-700 hover:bg-blue-500 text-white py-2 px-3 rounded">Main Menu</button>
            </a>


        <?php
    }
        ?>
</body>

</html>