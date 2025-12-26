<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Destination;
use App\Models\City;

class DestinationSeeder extends Seeder
{
    public function run(): void
    {
        \Illuminate\Support\Facades\Schema::disableForeignKeyConstraints();
        Destination::truncate();
        \Illuminate\Support\Facades\Schema::enableForeignKeyConstraints();

        // CASABLANCA - 10 destinations
        $casablanca = City::where('nom', 'Casablanca')->first();
        if ($casablanca) {
            $destinations = [
                [
                    'city_id' => $casablanca->id,
                    'nom' => 'Hassan II Mosque',
                    'titre' => 'Hassan II Mosque',
                    'description' => 'A breathtaking masterpiece situated right on the ocean. It features the second-tallest minaret in the world and intricate Moroccan craftsmanship. It\'s one of the few mosques in Morocco open to non-Muslim visitors for guided tours.',
                    'image' => 'images/destinations/casablanca_hassan_ii_mosque.png',
                ],
                [
                    'city_id' => $casablanca->id,
                    'nom' => 'Mohammed V Square',
                    'titre' => 'Mohammed V Square',
                    'description' => 'The administrative heart of the city, known for its beautiful French-colonial architecture, central fountain, and pigeons. It\'s a great spot to admire the city\'s unique blend of styles.',
                    'image' => 'images/destinations/casablanca_mohammed_v_square.png',
                ],
                [
                    'city_id' => $casablanca->id,
                    'nom' => 'Sacred Heart Cathedral',
                    'titre' => 'Sacred Heart Cathedral',
                    'description' => 'A stunning former cathedral built in the 1930s with a mix of Art Deco and Neo-Gothic styles. It now serves as a cultural center and offers panoramic views from its tower.',
                    'image' => 'images/destinations/casablanca_sacred_heart_cathedral.png',
                ],
                [
                    'city_id' => $casablanca->id,
                    'nom' => 'Habous Quarter',
                    'titre' => 'Habous Quarter',
                    'description' => 'Built by the French in the 1930s, this area features traditional-style architecture with orderly streets, souks, and olive markets. It\'s cleaner and quieter than the Old Medina, making it perfect for shopping for handicrafts.',
                    'image' => 'images/destinations/casablanca_habous_quarter.png',
                ],
                [
                    'city_id' => $casablanca->id,
                    'nom' => 'Old Medina',
                    'titre' => 'Old Medina',
                    'description' => 'The historic city center, surrounded by ramparts. It offers a more authentic, bustling atmosphere with narrow streets and vibrant markets selling everything from spices to leather goods.',
                    'image' => 'images/destinations/casablanca_old_medina.png',
                ],
                [
                    'city_id' => $casablanca->id,
                    'nom' => 'Museum of Moroccan Judaism',
                    'titre' => 'Museum of Moroccan Judaism',
                    'description' => 'A unique museum dedicated to the history and culture of the Jewish community in Morocco, housing artifacts, jewelry, and a reconstructed synagogue.',
                    'image' => 'images/destinations/casablanca_museum_jewish.png',
                ],
                [
                    'city_id' => $casablanca->id,
                    'nom' => 'The Corniche',
                    'titre' => 'The Corniche',
                    'description' => 'A scenic oceanfront promenade lined with restaurants, cafes, and beach clubs. It\'s a popular spot for a sunset walk or enjoying the nightlife in the Ain Diab area.',
                    'image' => 'images/destinations/casablanca_corniche.png',
                ],
                [
                    'city_id' => $casablanca->id,
                    'nom' => 'Arab League Park',
                    'titre' => 'Arab League Park',
                    'description' => 'The city\'s largest park, offering a peaceful green escape with palm tree-lined avenues and fountains. It was recently renovated and is located near the Sacred Heart Cathedral.',
                    'image' => 'images/destinations/casablanca_arab_league_park.png',
                ],
                [
                    'city_id' => $casablanca->id,
                    'nom' => 'Rick\'s Café',
                    'titre' => 'Rick\'s Café',
                    'description' => 'A romantic restaurant designed to recreate the famous bar from the movie Casablanca. It features 1930s decor, live jazz music, and a classic atmosphere.',
                    'image' => 'images/destinations/casablanca_ricks_cafe.png',
                ],
                [
                    'city_id' => $casablanca->id,
                    'nom' => 'Morocco Mall',
                    'titre' => 'Morocco Mall',
                    'description' => 'One of the largest shopping malls in Africa, featuring an aquarium, an IMAX theater, and a wide range of international stores. Perfect for shopping and entertainment.',
                    'image' => 'images/destinations/casablanca_morocco_mall.png',
                ],
            ];
            foreach ($destinations as $dest) {
                Destination::create($dest);
            }
        }

        // RABAT - 8 destinations
        $rabat = City::where('nom', 'Rabat')->first();
        if ($rabat) {
            $destinations = [
                [
                    'city_id' => $rabat->id,
                    'nom' => 'Kasbah of the Udayas',
                    'titre' => 'Kasbah of the Udayas',
                    'description' => 'A picturesque fortress located at the mouth of the Bou Regreg river. This 12th-century citadel features blue and white painted streets, Andalusian gardens, and stunning ocean views.',
                    'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/7/7c/Kasbah_des_Oudaias.jpg/800px-Kasbah_des_Oudaias.jpg',
                ],
                [
                    'city_id' => $rabat->id,
                    'nom' => 'Hassan Tower',
                    'titre' => 'Hassan Tower',
                    'description' => 'The minaret of an incomplete mosque initiated by Sultan Yacoub al-Mansour in 1195. Standing at 44 meters, it was intended to be the largest mosque in the world. The site also houses the Mausoleum of Mohammed V.',
                    'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/0/0d/Tour_Hassan_Rabat.jpg/800px-Tour_Hassan_Rabat.jpg',
                ],
                [
                    'city_id' => $rabat->id,
                    'nom' => 'Chellah',
                    'titre' => 'Chellah Necropolis',
                    'description' => 'A medieval fortified Muslim necropolis and ancient Roman ruins. This romantic garden sanctuary is home to nesting storks and contains fascinating archaeological remains dating back to the Phoenician era.',
                    'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/5a/Chellah.jpg/800px-Chellah.jpg',
                ],
                [
                    'city_id' => $rabat->id,
                    'nom' => 'Mohammed VI Museum',
                    'titre' => 'Museum of Modern Art',
                    'description' => 'Morocco\'s first major museum dedicated to modern and contemporary art. The building itself is a masterpiece of modern architecture, showcasing Moroccan and international artists.',
                    'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/6/66/Mus%C3%A9e_Mohammed_VI_d%27art_moderne_et_contemporain.jpg/800px-Mus%C3%A9e_Mohammed_VI_d%27art_moderne_et_contemporain.jpg',
                ],
                [
                    'city_id' => $rabat->id,
                    'nom' => 'Royal Palace',
                    'titre' => 'Dar al-Makhzen',
                    'description' => 'The primary and official residence of the King of Morocco. While you cannot enter, the magnificent gates with ornate brass doors and the surrounding grounds are breathtaking. The palace guards in traditional uniform add to the spectacle.',
                    'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/f9/Royal_Palace_Rabat.jpg/800px-Royal_Palace_Rabat.jpg',
                ],
                [
                    'city_id' => $rabat->id,
                    'nom' => 'Rabat Medina',
                    'titre' => 'Old Medina',
                    'description' => 'A more relaxed and less touristy medina compared to other Moroccan cities. Wander through the authentic souks, discover local crafts, and enjoy the peaceful atmosphere along Rue des Consuls.',
                    'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/8/8f/Rabat_Medina.jpg/800px-Rabat_Medina.jpg',
                ],
                [
                    'city_id' => $rabat->id,
                    'nom' => 'Andalusian Gardens',
                    'titre' => 'Jardin d\'Essais',
                    'description' => 'Beautiful formal gardens within the Kasbah of the Udayas, created in the 20th century. Features orange trees, flowering plants, fountain pools, and shaded walkways - a peaceful oasis in the city.',
                    'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/3/3e/Andalusian_Gardens_Rabat.jpg/800px-Andalusian_Gardens_Rabat.jpg',
                ],
                [
                    'city_id' => $rabat->id,
                    'nom' => 'Rabat Archaeological Museum',
                    'titre' => 'Archaeological Museum',
                    'description' => 'Home to an impressive collection of prehistoric, Roman, and Islamic artifacts. The bronze sculptures from Volubilis are particularly noteworthy.',
                    'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/2d/Museum_Rabat.jpg/800px-Museum_Rabat.jpg',
                ],
            ];
            foreach ($destinations as $dest) {
                Destination::create($dest);
            }
        }

        // MARRAKECH - 10 destinations
        $marrakech = City::where('nom', 'Marrakech')->first();
        if ($marrakech) {
            $destinations = [
                [
                    'city_id' => $marrakech->id,
                    'nom' => 'Jemaa el-Fnaa',
                    'titre' => 'The Square',
                    'description' => 'The bustling heart of Marrakech. This vast square is a UNESCO Masterpiece of the Oral and Intangible Heritage of Humanity, filled with snake charmers, musicians, storytellers, and food stalls. It comes alive particularly at night.',
                    'image' => 'images/destinations/jemaa_el_fnaa.png',
                ],
                [
                    'city_id' => $marrakech->id,
                    'nom' => 'Jardin Majorelle',
                    'titre' => 'Jardin Majorelle',
                    'description' => 'A stunning botanical garden originally designed by French painter Jacques Majorelle and later restored by Yves Saint Laurent. It features exotic plants, a distinctive electric-blue villa, and the Berber Museum.',
                    'image' => 'images/destinations/jardin_majorelle.png',
                ],
                [
                    'city_id' => $marrakech->id,
                    'nom' => 'Bahia Palace',
                    'titre' => 'Palais de la Bahia',
                    'description' => 'A 19th-century masterpiece of Moroccan architecture, known for its intricate mosaics, painted cedar ceilings, beautiful courtyards, and secret gardens. Built for a wealthy nobleman.',
                    'image' => 'images/destinations/bahia_palace.png',
                ],
                [
                    'city_id' => $marrakech->id,
                    'nom' => 'Koutoubia Mosque',
                    'titre' => 'Koutoubia Mosque',
                    'description' => 'The largest mosque in Marrakech and a major city landmark with its 77-meter-tall minaret visible throughout the city. It is a classic example of Almohad architecture from the 12th century.',
                    'image' => 'images/destinations/koutoubia_mosque.png',
                ],
                [
                    'city_id' => $marrakech->id,
                    'nom' => 'Ben Youssef Madrasa',
                    'titre' => 'Ben Youssef Madrasa',
                    'description' => 'A historic Islamic college founded in the 14th century. It is renowned for its breathtaking tilework, stucco carvings, carved wood, and peaceful central courtyard.',
                    'image' => 'images/destinations/ben_youssef_madrasa.png',
                ],
                [
                    'city_id' => $marrakech->id,
                    'nom' => 'Saadian Tombs',
                    'titre' => 'Saadian Tombs',
                    'description' => 'A royal necropolis from the Saadian dynasty, famous for its lavish decoration and the Hall of Twelve Columns. Sealed for centuries and rediscovered in 1917.',
                    'image' => 'images/destinations/saadian_tombs.png',
                ],
                [
                    'city_id' => $marrakech->id,
                    'nom' => 'El Badi Palace',
                    'titre' => 'El Badi Palace',
                    'description' => 'The ruins of a once-magnificent 16th-century palace built by Sultan Ahmad al-Mansur. While largely in ruins, it offers a glimpse into its past grandeur and hosts nesting storks.',
                    'image' => 'images/destinations/el_badi_palace.png',
                ],
                [
                    'city_id' => $marrakech->id,
                    'nom' => 'Yves Saint Laurent Museum',
                    'titre' => 'YSL Museum',
                    'description' => 'Located near the Majorelle Garden, this museum is dedicated to the fashion designer\'s work and his deep connection to Marrakech. Features rotating exhibitions of haute couture.',
                    'image' => 'images/destinations/ysl_museum.png',
                ],
                [
                    'city_id' => $marrakech->id,
                    'nom' => 'Marrakech Souks',
                    'titre' => 'Traditional Souks',
                    'description' => 'A labyrinth of alleyways filled with traditional markets selling everything from spices and carpets to leather goods and lanterns. Each souk specializes in different crafts.',
                    'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/e/e8/Marrakech_Souk.jpg/800px-Marrakech_Souk.jpg',
                ],
                [
                    'city_id' => $marrakech->id,
                    'nom' => 'Menara Gardens',
                    'titre' => 'Menara Gardens',
                    'description' => 'Historic gardens featuring an iconic pavilion reflected in a large pool, with the Atlas Mountains as backdrop. A popular spot for locals and visitors to relax.',
                    'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/a9/Menara_gardens%2C_Marrakech.jpg/800px-Menara_gardens%2C_Marrakech.jpg',
                ],
            ];
            foreach ($destinations as $dest) {
                Destination::create($dest);
            }
        }

        // FES - 8 destinations
        $fes = City::where('nom', 'Fes')->first();
        if ($fes) {
            $destinations = [
                [
                    'city_id' => $fes->id,
                    'nom' => 'Chouara Tannery',
                    'titre' => 'Chouara Tannery',
                    'description' => 'The largest and oldest tannery in the city, operating since medieval times. Visitors can watch the traditional leather dyeing process from balconies surrounding the colorful stone vats filled with natural dyes.',
                    'image' => 'images/destinations/fes_tannery.png',
                ],
                [
                    'city_id' => $fes->id,
                    'nom' => 'Al Quaraouiyine University',
                    'titre' => 'Al Quaraouiyine',
                    'description' => 'Founded in 859 by Fatima al-Fihri, it is considered the oldest existing, continually operating educational institution in the world according to UNESCO and Guinness World Records.',
                    'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/e/e5/Al-Qarawiyyin_Mosque_Fes.jpg/800px-Al-Qarawiyyin_Mosque_Fes.jpg',
                ],
                [
                    'city_id' => $fes->id,
                    'nom' => 'Bab Bou Jeloud',
                    'titre' => 'Blue Gate',
                    'description' => 'The famous ornamental gateway is the main western entrance to Fes el Bali (old Fes). Features beautiful blue and green zellige tilework and marks the beginning of the medina labyrinth.',
                    'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/6/6f/Bab_Bou_Jeloud_Fez.jpg/800px-Bab_Bou_Jeloud_Fez.jpg',
                ],
                [
                    'city_id' => $fes->id,
                    'nom' => 'Dar Batha Museum',
                    'titre' => 'Museum of Arts and Crafts',
                    'description' => 'A former royal palace converted into a museum showcasing traditional Moroccan arts and crafts. Features a beautiful Andalusian-style garden with ancient fountains.',
                    'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/e/e8/Dar_Batha_Museum.jpg/800px-Dar_Batha_Museum.jpg',
                ],
                [
                    'city_id' => $fes->id,
                    'nom' => 'Borj Nord',
                    'titre' => 'Arms Museum',
                    'description' => 'A fortress built in 1582 by the Saadian dynasty, now housing a fascinating museum of arms and weaponry. Offers spectacular panoramic views over the entire medina of Fes.',
                    'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/94/Borj_Nord_Fez.jpg/800px-Borj_Nord_Fez.jpg',
                ],
                [
                    'city_id' => $fes->id,
                    'nom' => 'Bou Inania Madrasa',
                    'titre' => 'Bou Inania Madrasa',
                    'description' => 'A stunning 14th-century Islamic school known for its elaborate decorative elements including carved cedar, sculpted stucco, and intricate zellige tilework. One of the few religious buildings in Morocco accessible to non-Muslims.',
                    'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/4f/Bou_Inania_Madrasa_Fes.jpg/800px-Bou_Inania_Madrasa_Fes.jpg',
                ],
                [
                    'city_id' => $fes->id,
                    'nom' => 'Nejjarine Museum',
                    'titre' => 'Museum of Wooden Arts',
                    'description' => 'Located in a beautifully restored 18th-century funduq (caravanserai), this museum displays traditional Moroccan woodworking tools and artifacts.',
                    'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/7/7c/Nejjarine_Museum.jpg/800px-Nejjarine_Museum.jpg',
                ],
                [
                    'city_id' => $fes->id,
                    'nom' => 'Royal Palace of Fes',
                    'titre' => 'Dar el Makhzen',
                    'description' => 'While the palace itself is not open to visitors, its magnificent golden doors are among the most photographed sights in Morocco. The seven gates are decorated with intricate zellige and brass work.',
                    'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/1e/Royal_Palace_Fes.jpg/800px-Royal_Palace_Fes.jpg',
                ],
            ];
            foreach ($destinations as $dest) {
                Destination::create($dest);
            }
        }

        // TANGIER - 6 destinations
        $tangier = City::where('nom', 'Tangier')->first();
        if ($tangier) {
            $destinations = [
                [
                    'city_id' => $tangier->id,
                    'nom' => 'Hercules Caves',
                    'titre' => 'Caves of Hercules',
                    'description' => 'Archaeological cave complex where the Mediterranean meets the Atlantic. The cave opening is shaped like the African continent and offers stunning ocean views. According to legend, Hercules rested here.',
                    'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/14/Grottes_d%27Hercule.jpg/800px-Grottes_d%27Hercule.jpg',
                ],
                [
                    'city_id' => $tangier->id,
                    'nom' => 'Cap Spartel',
                    'titre' => 'Cap Spartel',
                    'description' => 'The northwesternmost point of Africa, where the Mediterranean Sea meets the Atlantic Ocean. Features a historic lighthouse built in 1864 and dramatic coastal views.',
                    'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/3/30/Cap_Spartel.jpg/800px-Cap_Spartel.jpg',
                ],
                [
                    'city_id' => $tangier->id,
                    'nom' => 'Kasbah Museum',
                    'titre' => 'Museum of Moroccan Arts',
                    'description' => 'Located in the former Sultan\'s palace (Dar el Makhzen), this museum showcases the rich history and culture of Tangier and northern Morocco with archaeological artifacts and traditional crafts.',
                    'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/e/e0/Tangier_Kasbah_Museum.jpg/800px-Tangier_Kasbah_Museum.jpg',
                ],
                [
                    'city_id' => $tangier->id,
                    'nom' => 'Grand Socco',
                    'titre' => 'Place du 9 Avril 1947',
                    'description' => 'The main square of Tangier, linking the medina and the new city. A lively meeting place surrounded by cafes, with the colorful Mendoubia Gardens and the iconic Sidi Bou Abib Mosque.',
                    'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/a2/Grand_Socco_Tangier.jpg/800px-Grand_Socco_Tangier.jpg',
                ],
                [
                    'city_id' => $tangier->id,
                    'nom' => 'American Legation Museum',
                    'titre' => 'American Legation',
                    'description' => 'The only U.S. National Historic Landmark located outside the United States. This former diplomatic building is now a museum celebrating Moroccan-American relations.',
                    'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/5f/American_Legation_Tangier.jpg/800px-American_Legation_Tangier.jpg',
                ],
                [
                    'city_id' => $tangier->id,
                    'nom' => 'Petit Socco',
                    'titre' => 'Petit Socco',
                    'description' => 'A small square in the heart of the medina that was once the social and commercial heart of Tangier. Famous for its cafes frequented by writers and artists like Paul Bowles and William S. Burroughs.',
                    'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/b8/Petit_Socco_Tangier.jpg/800px-Petit_Socco_Tangier.jpg',
                ],
            ];
            foreach ($destinations as $dest) {
                Destination::create($dest);
            }
        }

        // CHEFCHAOUEN - 6 destinations
        $chefchaouen = City::where('nom', 'Chefchaouen')->first();
        if ($chefchaouen) {
            $destinations = [
                [
                    'city_id' => $chefchaouen->id,
                    'nom' => 'The Blue Medina',
                    'titre' => 'Blue Medina',
                    'description' => 'Wander through the dreamy blue-washed streets of the old town. Every corner offers a photo opportunity with vivid blue walls, colorful pots of flowers, and friendly cats lounging in doorways.',
                    'image' => 'images/destinations/chefchaouen_medina.png',
                ],
                [
                    'city_id' => $chefchaouen->id,
                    'nom' => 'Spanish Mosque',
                    'titre' => 'Spanish Mosque',
                    'description' => 'A white mosque located on a hill overlooking the city. Built by the Spanish, it offers the best panoramic views of Chefchaouen and surrounding Rif Mountains, especially stunning at sunset.',
                    'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/a2/Chefchaouen_Mosque.jpg/800px-Chefchaouen_Mosque.jpg',
                ],
                [
                    'city_id' => $chefchaouen->id,
                    'nom' => 'Kasbah Museum',
                    'titre' => 'Kasbah and Gardens',
                    'description' => 'A heavily restored 15th-century fortress in the main square (Place Uta el-Hammam), featuring a beautiful Andalusian garden, an ethnographic museum, and a tower with panoramic views.',
                    'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/5e/Kasbah_Chefchaouen.jpg/800px-Kasbah_Chefchaouen.jpg',
                ],
                [
                    'city_id' => $chefchaouen->id,
                    'nom' => 'Akchour Waterfalls',
                    'titre' => 'Cascades d\'Akchour',
                    'description' => 'A stunning series of waterfalls and natural rock pools located about 30km from Chefchaouen. Perfect for hiking, swimming, and connecting with nature in the Rif Mountains.',
                    'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/f3/Cascades_d%27Akchour.jpg/800px-Cascades_d%27Akchour.jpg',
                ],
                [
                    'city_id' => $chefchaouen->id,
                    'nom' => 'Ras El Maa',
                    'titre' => 'Ras El Maa Waterfall',
                    'description' => 'A small waterfall at the edge of the medina where locals come to wash clothes. The cool mountain water flows through the town and offers a refreshing spot to relax.',
                    'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/28/Ras_El_Maa_Chefchaouen.jpg/800px-Ras_El_Maa_Chefchaouen.jpg',
                ],
                [
                    'city_id' => $chefchaouen->id,
                    'nom' => 'Talassemtane National Park',
                    'titre' => 'Talassemtane Park',
                    'description' => 'A beautiful national park surrounding Chefchaouen, featuring cedar forests, limestone peaks, and rare Moroccan fir trees. Excellent for hiking and wildlife spotting.',
                    'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/d/d5/Talassemtane_Park.jpg/800px-Talassemtane_Park.jpg',
                ],
            ];
            foreach ($destinations as $dest) {
                Destination::create($dest);
            }
        }

        // MERZOUGA - 5 destinations
        $merzouga = City::where('nom', 'Merzouga')->first();
        if ($merzouga) {
            $destinations = [
                [
                    'city_id' => $merzouga->id,
                    'nom' => 'Erg Chebbi Dunes',
                    'titre' => 'Erg Chebbi',
                    'description' => 'Massive wind-blown sand dunes that turn a stunning orange-gold at sunrise and sunset. Experience the classic Sahara Desert with camel treks, desert camps, and star-gazing under pristine night skies.',
                    'image' => 'images/destinations/merzouga_dunes.png',
                ],
                [
                    'city_id' => $merzouga->id,
                    'nom' => 'Lake Dayet Srji',
                    'titre' => 'Seasonal Salt Lake',
                    'description' => 'A seasonal salt lake that attracts flocks of pink flamingos and other migratory birds when it holds water (typically winter and spring). A surprising oasis next to the desert dunes.',
                    'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/9c/Merzouga_Lake.jpg/800px-Merzouga_Lake.jpg',
                ],
                [
                    'city_id' => $merzouga->id,
                    'nom' => 'Khamlia Village',
                    'titre' => 'Gnawa Village',
                    'description' => 'A nearby village inhabited by descendants of sub-Saharan Africans, known for their captivating Gnawa music performances and traditional hospitality with sweet mint tea.',
                    'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/e/e3/Gnawa_musicians_Merzouga.jpg/800px-Gnawa_musicians_Merzouga.jpg',
                ],
                [
                    'city_id' => $merzouga->id,
                    'nom' => 'Rissani',
                    'titre' => 'Historic Trading Post',
                    'description' => 'A historic town 40km from Merzouga, once a major caravan trade center. Visit the traditional souk (especially lively on market days) and the Mausoleum of Moulay Ali Cherif, founder of the Alaouite dynasty.',
                    'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/a7/Rissani_Market.jpg/800px-Rissani_Market.jpg',
                ],
                [
                    'city_id' => $merzouga->id,
                    'nom' => 'Fossil Sites',
                    'titre' => 'Desert Fossils',
                    'description' => 'Visit local workshops where you can see fossils being extracted and carved. The region is rich in marine fossils dating back millions of years when this area was under the sea.',
                    'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/c/c8/Moroccan_Fossils.jpg/800px-Moroccan_Fossils.jpg',
                ],
            ];
            foreach ($destinations as $dest) {
                Destination::create($dest);
            }
        }

        // ESSAOUIRA - 6 destinations
        $essaouira = City::where('nom', 'Essaouira')->first();
        if ($essaouira) {
            $destinations = [
                [
                    'city_id' => $essaouira->id,
                    'nom' => 'Skala de la Ville',
                    'titre' => 'The Ramparts',
                    'description' => 'Impressive 18th-century sea bastions and ramparts that protected the city from attacks. Features rows of European cannons and offers stunning ocean views. A famous filming location for Game of Thrones.',
                    'image' => 'images/destinations/essaouira_ramparts.png',
                ],
                [
                    'city_id' => $essaouira->id,
                    'nom' => 'Essaouira Beach',
                    'titre' => 'Windy Beach',
                    'description' => 'A broad, sandy beach famous for kitesurfing and windsurfing due to the reliable trade winds. Watch colorful kites fill the sky or take lessons from local surf schools.',
                    'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/f6/Essaouira_Beach.jpg/800px-Essaouira_Beach.jpg',
                ],
                [
                    'city_id' => $essaouira->id,
                    'nom' => 'Essaouira Medina',
                    'titre' => 'UNESCO Medina',
                    'description' => 'A UNESCO World Heritage site, this 18th-century fortified town features whitewashed buildings with blue shutters, art galleries, and workshops of master craftsmen working with thuya wood.',
                    'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/3/38/Essaouira_Medina.jpg/800px-Essaouira_Medina.jpg',
                ],
                [
                    'city_id' => $essaouira->id,
                    'nom' => 'Port of Essaouira',
                    'titre' => 'Fishing Port',
                    'description' => 'A working fishing port where blue boats bring in the daily catch. Watch fishermen mend nets, see seagulls swarm, and enjoy fresh grilled fish at harbourside stalls.',
                    'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/91/Essaouira_Port.jpg/800px-Essaouira_Port.jpg',
                ],
                [
                    'city_id' => $essaouira->id,
                    'nom' => 'Sidi Mohammed Ben Abdallah Museum',
                    'titre' => 'Museum of Arts',
                    'description' => 'Housed in a former pasha\'s residence, this museum displays traditional Moroccan musical instruments, weapons, carpets, jewelry, and regional artifacts.',
                    'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/7/7d/Museum_Essaouira.jpg/800px-Museum_Essaouira.jpg',
                ],
                [
                    'city_id' => $essaouira->id,
                    'nom' => 'Ile de Mogador',
                    'titre' => 'Mogador Island',
                    'description' => 'A small island visible from the shore, now a nature reserve protecting the rare Eleonora\'s falcon. Boat trips around the island offer opportunities to see these magnificent birds.',
                    'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/44/Mogador_Island.jpg/800px-Mogador_Island.jpg',
                ],
            ];
            foreach ($destinations as $dest) {
                Destination::create($dest);
            }
        }

        // AGADIR - 6 destinations
        $agadir = City::where('nom', 'Agadir')->first();
        if ($agadir) {
            $destinations = [
                [
                    'city_id' => $agadir->id,
                    'nom' => 'Agadir Beach',
                    'titre' => 'The Promenade',
                    'description' => 'A 10km stretch of fine golden sand with a modern promenade lined with cafes, restaurants, and hotels. Perfect for sunbathing, swimming, and beach sports year-round.',
                    'image' => 'images/destinations/agadir_beach.png',
                ],
                [
                    'city_id' => $agadir->id,
                    'nom' => 'Kasbah of Agadir Oufella',
                    'titre' => 'Agadir Oufella',
                    'description' => 'The hilltop ruins of the old kasbah destroyed in the devastating 1960 earthquake. Climb to the top for the best panoramic views over the entire city, bay, and port.',
                    'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/7/77/Agadir_Oufella.jpg/800px-Agadir_Oufella.jpg',
                ],
                [
                    'city_id' => $agadir->id,
                    'nom' => 'Souk El Had',
                    'titre' => 'Sunday Market',
                    'description' => 'One of Morocco\'s largest souks, open daily despite the name. Over 6,000 stalls selling everything from fresh produce and spices to traditional crafts, carpets, and argan oil products.',
                    'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/2e/Souk_El_Had_Agadir.jpg/800px-Souk_El_Had_Agadir.jpg',
                ],
                [
                    'city_id' => $agadir->id,
                    'nom' => 'Valley of the Birds',
                    'titre' => 'Vallée des Oiseaux',
                    'description' => 'A small zoo and botanical garden in the city center, home to exotic birds, monkeys, and other animals. A pleasant shaded escape with waterfalls and cafes.',
                    'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/5a/Valley_Birds_Agadir.jpg/800px-Valley_Birds_Agadir.jpg',
                ],
                [
                    'city_id' => $agadir->id,
                    'nom' => 'Marina d\'Agadir',
                    'titre' => 'Agadir Marina',
                    'description' => 'A modern marina with luxury yachts, waterfront restaurants, boutique shops, and a cinema. A sophisticated area for evening strolls and dining.',
                    'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/8/85/Agadir_Marina.jpg/800px-Agadir_Marina.jpg',
                ],
                [
                    'city_id' => $agadir->id,
                    'nom' => 'Paradise Valley',
                    'titre' => 'Paradise Valley',
                    'description' => 'A stunning oasis in the Atlas Mountains, about 30km from Agadir. Features natural pools, palm groves, and dramatic rock formations - perfect for swimming and hiking.',
                    'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/a1/Paradise_Valley_Morocco.jpg/800px-Paradise_Valley_Morocco.jpg',
                ],
            ];
            foreach ($destinations as $dest) {
                Destination::create($dest);
            }
        }

        // OUARZAZATE - 6 destinations
        $ouarzazate = City::where('nom', 'Ouarzazate')->first();
        if ($ouarzazate) {
            $destinations = [
                [
                    'city_id' => $ouarzazate->id,
                    'nom' => 'Ait Benhaddou',
                    'titre' => 'Ksar of Ait Benhaddou',
                    'description' => 'A UNESCO World Heritage site and ancient fortified village (ksar) made of rammed earth. A legendary filming location for Gladiator, Lawrence of Arabia, Game of Thrones, and many other productions.',
                    'image' => 'images/destinations/ait_benhaddou.png',
                ],
                [
                    'city_id' => $ouarzazate->id,
                    'nom' => 'Atlas Studios',
                    'titre' => 'Cinema Studios',
                    'description' => 'One of the largest film studios in the world. Take a tour to see sets from famous movies including The Mummy, Gladiator, Kingdom of Heaven, and many Hollywood blockbusters.',
                    'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/8/87/Ouarzazate_Atlas_Studios.jpg/800px-Ouarzazate_Atlas_Studios.jpg',
                ],
                [
                    'city_id' => $ouarzazate->id,
                    'nom' => 'Taourirt Kasbah',
                    'titre' => 'Taourirt Kasbah',
                    'description' => 'A well-preserved 19th-century kasbah in the center of Ouarzazate, once the residence of the Glaoui family who controlled the region. Features beautiful painted ceilings and intricate tilework.',
                    'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/f3/Taourirt_Kasbah.jpg/800px-Taourirt_Kasbah.jpg',
                ],
                [
                    'city_id' => $ouarzazate->id,
                    'nom' => 'Oasis Fint',
                    'titre' => 'Fint Oasis',
                    'description' => 'A hidden palm oasis just 15km from Ouarzazate, featuring traditional Berber villages, date palms, and a peaceful river. A stark contrast to the surrounding desert landscape.',
                    'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/16/Fint_Oasis.jpg/800px-Fint_Oasis.jpg',
                ],
                [
                    'city_id' => $ouarzazate->id,
                    'nom' => 'Dades Gorges',
                    'titre' => 'Dades Valley',
                    'description' => 'A spectacular gorge carved by the Dades River through the Atlas Mountains. Known for its dramatic rock formations, kasbahs, and the famous "monkey fingers" rock pillars.',
                    'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/55/Dades_Gorges.jpg/800px-Dades_Gorges.jpg',
                ],
                [
                    'city_id' => $ouarzazate->id,
                    'nom' => 'Lake Mansour Eddahbi',
                    'titre' => 'Mansour Eddahbi Dam',
                    'description' => 'A large reservoir created by a dam on the Draa River. Popular for water sports and offers beautiful views with the Atlas Mountains as a backdrop.',
                    'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/28/Lake_Mansour.jpg/800px-Lake_Mansour.jpg',
                ],
            ];
            foreach ($destinations as $dest) {
                Destination::create($dest);
            }
        }

        // MEKNES - 7 destinations
        $meknes = City::where('nom', 'Meknes')->first();
        if ($meknes) {
            $destinations = [
                [
                    'city_id' => $meknes->id,
                    'nom' => 'Bab Mansour',
                    'titre' => 'The Grand Gate',
                    'description' => 'The most famous and grandest gate of all imperial cities in Morocco, completed in 1732. Known for its incredible scale, beautiful zellige mosaics, and impressive arched entrance.',
                    'image' => 'images/destinations/meknes_gate.png',
                ],
                [
                    'city_id' => $meknes->id,
                    'nom' => 'Volubilis',
                    'titre' => 'Roman Ruins',
                    'description' => 'Located 30km from Meknes, these are Morocco\'s best-preserved Roman ruins, a UNESCO World Heritage site. Wander among columns, arches, and stunning floor mosaics depicting mythological scenes.',
                    'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/3/3e/Volubilis_Basilica.jpg/800px-Volubilis_Basilica.jpg',
                ],
                [
                    'city_id' => $meknes->id,
                    'nom' => 'Mausoleum of Moulay Ismail',
                    'titre' => 'Moulay Ismail Mausoleum',
                    'description' => 'The elaborate tomb of Sultan Moulay Ismail, who made Meknes Morocco\'s capital in the 17th century. One of the few mosques in Morocco open to non-Muslims, featuring beautiful courtyards and fountains.',
                    'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/d/d9/Mausoleum_Moulay_Ismail.jpg/800px-Mausoleum_Moulay_Ismail.jpg',
                ],
                [
                    'city_id' => $meknes->id,
                    'nom' => 'Heri es-Souani',
                    'titre' => 'Royal Granaries',
                    'description' => 'Massive granaries and stables built by Moulay Ismail to store grain and house 12,000 horses. An impressive feat of engineering with thick walls that kept the interior cool.',
                    'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/6/69/Heri_es_Souani.jpg/800px-Heri_es_Souani.jpg',
                ],
                [
                    'city_id' => $meknes->id,
                    'nom' => 'Dar Jamai Museum',
                    'titre' => 'Museum of Moroccan Arts',
                    'description' => 'A 19th-century palace converted into a museum showcasing traditional Moroccan arts and crafts, including ceramics, textiles, jewelry, and woodwork. Features a beautiful Andalusian garden.',
                    'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/a8/Dar_Jamai.jpg/800px-Dar_Jamai.jpg',
                ],
                [
                    'city_id' => $meknes->id,
                    'nom' => 'Bou Inania Madrasa',
                    'titre' => 'Bou Inania Madrasa',
                    'description' => 'A 14th-century Islamic school featuring stunning architecture with carved cedar wood, intricate stucco, and colorful zellige tilework. One of the finest examples of Marinid architecture.',
                    'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/b5/Bou_Inania_Meknes.jpg/800px-Bou_Inania_Meknes.jpg',
                ],
                [
                    'city_id' => $meknes->id,
                    'nom' => 'Meknes Medina',
                    'titre' => 'Old Medina',
                    'description' => 'A UNESCO World Heritage site, the medina of Meknes is less touristy than others, offering an authentic experience with traditional souks, historic monuments, and local daily life.',
                    'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/19/Meknes_Medina.jpg/800px-Meknes_Medina.jpg',
                ],
            ];
            foreach ($destinations as $dest) {
                Destination::create($dest);
            }
        }
    }
}
