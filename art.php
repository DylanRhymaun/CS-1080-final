<?php error_reporting(E_ALL);
ini_set('display_errors', 1); 
include 'includes/top.php'; ?>
    <main>
<!-- ################################################################################################################# -->
        <section class="sidebarNoBG">
        <?php include 'includes/header.php';
        include 'includes/nav.php'; ?>
        <h2>Gallery</h2>
        <p>I've always been inspired by video games, so I took up 3D modelling in 2020 during the Covid-19 Pandemic in my spare time. I've submitted work to game jams (GMTK 2022) and competitions (Pwnisher 2022 & 2023), and plan to continue participating in more as I grow my skillset. My work most often pays homage to retro graphics from the PS2/DS era.  <br>Given that most of these works are made with computer applications in mind, there are obviously a number of notable titles that influenced me most. Namely, Halo Reach, Deus Ex Mankind Divided, Dishonored, Rimworld, Need for Speed Heat, Risk of Rain 2, the Witness, and Disco Elysium have had the most impact on my style in both art and writing. My favorite games overall are Elden Ring, Rimworld, Skyrim, the Outer Wilds, and Zelda Breath of the Wild.<br></p>
        <p><strong>Hover over an image to zoom in</strong></p>



        <?php
$databaseName = 'DRHYMAUN_labs';
$dsn = 'mysql:host=webdb.uvm.edu;dbname=' . $databaseName;
$username = 'drhymaun_writer';
$password = 'nTcc]uXZ4B,,I4nfqQi<';

$pdo = new PDO($dsn, $username, $password);
if($pdo) print '<!-- Connection complete -->';

?>
        <h2>Softwares I use</h2>        
        <table>
                <tr>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Competency (1-5)</th>
                    <th>Year learned</th>
                </tr>

            <?php
            $sql = 'SELECT fldName, fldType, fldCompetency, fldYearLearned FROM softwareKnowledge';
            $statement = $pdo->prepare($sql);
            $statement->execute();

            $records = $statement->fetchAll();

            foreach($records as $record){
                print '<tr>';
                    print '<td>' . $record['fldName'] .'</td>';
                    print '<td>' . $record['fldType'] .'</td>';
                    print '<td>' . $record['fldCompetency'] .'</td>';
                    print '<td>' . $record['fldYearLearned'] .'</td>';
                    print '</tr>' . PHP_EOL;
                }
            ?>
            </table>

            <br>
            <p><a href="../sitemap.php">Back to Sitemap - Dylan Rhymaun - Section OL</a></p>
        </section>
<!-- ################################################################################################################# -->
        <section class="art">
            <h2 style="color: transparent;">Gallery</h2>

            <img class ="gallery" alt="A BMW E30" src="images/1.gif">
            <img class ="gallery" alt="A Nissan Skyline with a rocket on its roof" src="images/2.gif">
            <img class ="gallery" alt="A small spaceship" src="images/3.png">
            <img class ="gallery" alt="A view from inside a traincar at sunset" src="images/4.gif">
            <img class ="gallery" alt="A robot falling asleep on a subway" src="images/5.gif">
            <img class ="gallery" alt="Three old sailbots on the high seas" src="images/6.gif">
            <img class ="gallery" alt="A bowl of ramen" src="images/7.png">
            <img class ="gallery" alt="A photo of waves crashing into rocks at North Beach, Burlington vT" src="images/7A.jpg">
            <img class ="gallery" alt="A funeral scene with cyberpunk and mideval props" src="images/8.png">
            <img class ="gallery" alt="An animated robotic arm" src="images/9.gif">
            <img alt="A spaceship firing a lazer towards a planet" src="images/10.gif">
            <img alt="A photo of clouds" src="images/10.jpg">
            <img alt="A ferriari testarossa" src="images/11.png">
            <img alt="A silhouette of a skateboarder" src="images/12.jpg">
            <img alt="A lego version of the character Bastion from the game Overwatch" src="images/13.png">
            <img alt="A realistic rendering of tablewear" src="images/15.png">
            <img alt="A gameboy" src="images/16.gif">
            <img alt="An isometric view of a crashed spaceship amidst ruins in the desert" src="images/17.png">
            <img alt="A first person persective of a person finding creepy obelisks in the desert" src="images/18.gif">
            <img alt="Silhouettes of skateboard tricks overlayed on each other" src="images/19.jpg">
            <img alt="Another BMW E30 with high contrast" src="images/20.png">
            <img alt="A mock spaceship ad" src="images/21.png">
            <img alt="A fancy door" src="images/22.png">
            <img alt="A lighthouse" src="images/24.gif">
            <img alt="A spaceship factory" src="images/25.png">
            <img alt="A photo of a tree taken in Langaryd, Sweden. My favorite photo." src="images/26.jpg">
            <img alt="A cargo spaceship" src="images/27.png">
            <img alt="Portraits of the members of the band Alt-J" src="images/28.png">
            <img alt="A drawing of a man doing karate" src="images/29.png">
            <img alt="A drawing of a quirky viking. " src="images/30.png">
            <img alt="A drawing of the main villain from the BBC4 Show Utopia" src="images/31.png">
            <img alt="A drawing of a pale woman with two different colored eyes" src="images/32.png">
            <img alt="A black and white drawing of a civil war soldier" src="images/33.png">
            <img alt="A manipulated photo of my friend siting in front of an abandoned house, though their body is pixellated" src="images/34.jpg">
            <img alt="An animation of a mock space combat game" src="images/35.gif">
            <img alt="A high contrast photo of a condo in Toronto" src="images/36.jpg">
            <img alt="A portrait of a model in front of UVM's taxidermy collection" src="images/37.jpg">
            <img alt="A space-like image of some rocks over a still lake" src="images/38.JPG">
            <img alt="A deep red sunset taken with a drone camera" src="images/39.JPG">
            <img alt="A photo of the CN tower with a tree branch in front of it" src="images/40.JPG">
            <img alt="A cinematic black and white landscape of a Quebec city street" src="images/41.jpg">
            <img alt="A cinematic black and white landscape of another Quebec city street" src="images/42.jpg">
            <img alt="A cinematic black and white landscape of the Quebec City chateau" src="images/43.jpg">
            <img alt="A cinematic black and white landscape of A cathedral interior in Quebec city" src="images/44.jpg">
            <img alt="A cinematic black and white landscape from inside the Quebec city chateau courtyard " src="images/45.jpg">
            <img alt="A cinematic black and white landscape From the lobby of the Quebec city chateau hotel " src="images/46.jpg">

        </section>
<!-- ################################################################################################################# -->
    </main>
<?php include 'includes/footer.php'; ?>