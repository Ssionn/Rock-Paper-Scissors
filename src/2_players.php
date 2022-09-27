<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>RPS 2-Players</title>
</head>

<body class="bg-slate-900">
    <header>
        <div class="w-screen">
            <h1 class="text-4xl font-bold text-white flex justify-center items-center mt-[60px]">Rock Paper Scissors
            </h1>
        </div>
    </header>
    <?php
    session_start();
    if (!isset($_POST['keuze01']) && !isset($_POST['keuze02'])) {
    ?>
        <form method="post" class="flex flex-col items-center">
            <label for="keuze01" class="pt-[40px] pb-[50px] text-white">Kies een optie:</label>
            <select id="keuze01" name="keuze01" class="w-28 border-b-2 border-black mb-4">
                <option value="steen01">Steen</option>
                <option value="papier01">Papier</option>
                <option value="schaar01">Schaar</option>
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

    if (isset($_POST["keuze01"])) {
        $_SESSION['keuze01'] = $_POST["keuze01"];
    ?>
        <form method="post" class="flex flex-col items-center">
            <h1 class="text-md text-white pt-10">Player 1 heeft gekozen!</h1>
            <label for="keuze02" class="pt-[40px] pb-[50px] text-white">Kies een optie:</label>
            <select id="keuze02" name="keuze02" class="w-28 border-b-2 border-black mb-4">
                <option value="steen02">Steen</option>
                <option value="papier02">Papier</option>
                <option value="schaar02">Schaar</option>
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
    if (isset($_POST['keuze02'])) {
        $_SESSION['keuze02'] = $_POST["keuze02"];
        $speler1 = $_SESSION['keuze01'];
        $speler2 = $_SESSION['keuze02'];

        function battle($speler1, $speler2)
        {
            if ($speler1 === $speler2) {
                return "Gelijkspel!";
            } elseif (($speler1 == "steen01" && $speler2 == "schaar02") or ($speler1 == "papier01" && $speler2 == "steen02") or ($speler1 == "schaar01" && $speler2 == "papier02")) {
                return "Player 1 heeft gewonnen!";
            } else {
                return "Player 2 heeft gewonnen!";
            }
        }
    ?>
        <h2 class="text-lg text-white underline flex justify-center mt-10 pb-5"> <?= battle($speler1, $speler2) ?> </h2>
        <h3 class="text-md text-white flex justify-center pb-5">Player 1 had <?= $speler1 ?> gekozen!</h3>
        <h3 class="text-md text-white flex justify-center pb-5">Player 2 had <?= $speler2 ?> gekozen!</h3>

        <div class="flex flex-col items-center mt-5">
            <a href="index.html">
                <button value="Main Menu" id="btnSubmit3" class="bg-blue-700 hover:bg-blue-500 text-white py-2 px-3 rounded">Main Menu</button>
            </a>

    <?php
    }
    ?>
</body>

</html>