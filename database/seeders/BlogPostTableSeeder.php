<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class BlogPostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('blog_posts')->insert([

            // Post 1
            [
                'blogcat_id' => 5,  // Estados
                'user_id' => 1,     // Admin
                'post_title' => 'Aguascalientes',
                'post_slug' => 'aguascalientes',
                'post_image' => 'upload/post/post1.jpg',

                'short_descp' => 'Aguascalientes, oficialmente Estado Libre y Soberano de Aguascalientes, es uno de los treinta y un estados que, junto con la Ciudad de México, conforman México; se ubica en la región centro norte de México y parte del Bajío mexicano.​ Su capital y ciudad más poblada es Aguascalientes. Se divide en once municipios.',

                'long_descp' => '<p><strong>Aguascalientes</strong>, oficialmente <strong>Estado Libre y Soberano de Aguascalientes</strong>, es uno de los <a title="Organizaci&oacute;n territorial de M&eacute;xico" href="https://es.wikipedia.org/wiki/Organizaci%C3%B3n_territorial_de_M%C3%A9xico">treinta y un estados</a> que, junto con la <a title="Ciudad de M&eacute;xico" href="https://es.wikipedia.org/wiki/Ciudad_de_M%C3%A9xico">Ciudad de M&eacute;xico</a>, conforman <a title="M&eacute;xico" href="https://es.wikipedia.org/wiki/M%C3%A9xico">M&eacute;xico</a>; se ubica en la regi&oacute;n <a title="Centronorte de M&eacute;xico" href="https://es.wikipedia.org/wiki/Centronorte_de_M%C3%A9xico">centronorte de M&eacute;xico</a> y parte del <a class="mw-redirect" title="El Baj&iacute;o (M&eacute;xico)" href="https://es.wikipedia.org/wiki/El_Baj%C3%ADo_(M%C3%A9xico)">Baj&iacute;o</a> mexicano.<sup id="cite_ref-12" class="reference separada"></sup>​ Su capital y ciudad m&aacute;s poblada es <a class="mw-redirect" title="Aguascalientes (M&eacute;xico)" href="https://es.wikipedia.org/wiki/Aguascalientes_(M%C3%A9xico)">Aguascalientes</a>. Se divide en <a title="Anexo:Municipios de Aguascalientes" href="https://es.wikipedia.org/wiki/Anexo:Municipios_de_Aguascalientes">once municipios</a>.</p>
                    <p>Previo a la <a title="Conquista de Am&eacute;rica" href="https://es.wikipedia.org/wiki/Conquista_de_Am%C3%A9rica">conquista de Am&eacute;rica</a>, el territorio fue punto de encuentro de distintos aguerridos se&ntilde;or&iacute;os <a class="mw-redirect" title="Chichimecas" href="https://es.wikipedia.org/wiki/Chichimecas">chichimecas</a>. Los espa&ntilde;oles establecieron peque&ntilde;as poblaciones coloniales desde mediados del siglo&nbsp;<span style="font-variant: small-caps; text-transform: lowercase;">XVI</span>, incluida la actual capital, y el territorio perteneci&oacute; a la <a title="Nueva Galicia" href="https://es.wikipedia.org/wiki/Nueva_Galicia">Nueva Galicia</a> (Jalisco) durante casi toda la colonia; donde desempe&ntilde;aba un rol agropecuario y de punto de descanso en la <a title="Ruta de la Plata (M&eacute;xico)" href="https://es.wikipedia.org/wiki/Ruta_de_la_Plata_(M%C3%A9xico)">Ruta de la Plata</a>. Pas&oacute; a ser parte de <a title="Zacatecas" href="https://es.wikipedia.org/wiki/Zacatecas">Zacatecas</a> brevemente, pues fue declarado territorio independiente en 1835 mientras el estado vecino <a title="Rebeli&oacute;n en Zacatecas de 1835" href="https://es.wikipedia.org/wiki/Rebeli%C3%B3n_en_Zacatecas_de_1835">se sublevaba</a>, aunque no fue sino hasta la <a title="Constituci&oacute;n Federal de los Estados Unidos Mexicanos (1857)" href="https://es.wikipedia.org/wiki/Constituci%C3%B3n_Federal_de_los_Estados_Unidos_Mexicanos_(1857)">Constituci&oacute;n de 1857</a> que fue reconocido como estado. La <a title="Porfiriato" href="https://es.wikipedia.org/wiki/Porfiriato">&eacute;poca porfiriana</a> benefici&oacute; enormemente a Aguascalientes con la industria del <a title="Ferrocarril Central Mexicano" href="https://es.wikipedia.org/wiki/Ferrocarril_Central_Mexicano">Ferrocarril Central Mexicano</a>, provocando una explosi&oacute;n poblacional y art&iacute;stica.<sup id="cite_ref-14" class="reference separada"></sup>​ Hosped&oacute; la <a title="Convenci&oacute;n de Aguascalientes" href="https://es.wikipedia.org/wiki/Convenci%C3%B3n_de_Aguascalientes">Convenci&oacute;n Revolucionaria de 1914</a>, y luego fue escenario de la <a title="Guerra Cristera" href="https://es.wikipedia.org/wiki/Guerra_Cristera">Guerra Cristera</a>. Desde la d&eacute;cada de 1980 ha vuelto a entrar en una explosi&oacute;n demogr&aacute;fica, a manos de la industria textil, automotriz y electr&oacute;nica; sin dejar de lado las actividades agropecuarias. Es reconocido como uno de los estados m&aacute;s seguros y de mayor crecimiento econ&oacute;mico de M&eacute;xico</p>',

                'post_tags' => 'Bien Inmobiliario,estados,Mexico',
                'created_at' => '2023-07-06 07:57:39',
            ],

            // Post 2
            [
                'blogcat_id' => 5,  // Estados
                'user_id' => 1,     // Admin
                'post_title' => 'Colima',
                'post_slug' => 'colima',
                'post_image' => 'upload/post/post2.jpg',

                'short_descp' => 'Colima, oficialmente Estado Libre y Soberano de Colima, es uno de los treinta y un estados que, junto con la Ciudad de México, forman México.5​6​ Su capital es la ciudad homónima y la ciudad más poblada es Manzanillo. Está dividido territorialmente en diez municipios.',

                'long_descp' => '<p>Fundada en <a title="1527" href="https://es.wikipedia.org/wiki/1527">1527</a> originalmente como Villa de San Sebasti&aacute;n, el nombre de Colima viene del n&aacute;huatl Acolman, que significa "lugar donde tuerce el agua" o "lugar donde hace recodo el r&iacute;o". El territorio de Colima, del que casi tres cuartas partes de superficie est&aacute;n cubiertas por monta&ntilde;as y colinas, queda comprendido dentro de una derivaci&oacute;n de la <a title="Sierra Madre del Sur" href="https://es.wikipedia.org/wiki/Sierra_Madre_del_Sur">Sierra Madre del Sur</a>, que se compone de cuatro sistemas monta&ntilde;osos.</p>
                    <p>A pesar de ser una peque&ntilde;a entidad, Colima posee monumentos hist&oacute;ricos como su catedral bas&iacute;lica menor, construcci&oacute;n que se empez&oacute; en 1525 de estilo predominantemente neocl&aacute;sico aunque tambi&eacute;n muestra algunos rasgos arquitect&oacute;nicos de estilos barroco y g&oacute;tico; el Palacio de Gobierno, con los magn&iacute;ficos murales del pintor colimense <a class="new" title="Jorge Ch&aacute;vez Carrillo (a&uacute;n no redactado)" href="https://es.wikipedia.org/w/index.php?title=Jorge_Ch%C3%A1vez_Carrillo&amp;action=edit&amp;redlink=1">Jorge Ch&aacute;vez Carrillo</a>, que ilustran temas hist&oacute;ricos relativos a la Conquista, la Colonizaci&oacute;n y la Guerra de Independencia. Otros lugares culturales y arquitect&oacute;nicos que destacan son: El Teatro Hidalgo, que data del siglo&nbsp;<span style="font-variant: small-caps; text-transform: lowercase;">XIX</span>; el Templo de <a class="new" title="San Francisco del Pil&oacute;n (a&uacute;n no redactado)" href="https://es.wikipedia.org/w/index.php?title=San_Francisco_del_Pil%C3%B3n&amp;action=edit&amp;redlink=1">San Francisco del Pil&oacute;n</a>, fundado en 1554; la Casa de la Cultura, con una incre&iacute;ble biblioteca, sala de exposiciones, auditorio y talleres de diversas actividades art&iacute;sticas.</p>',

                'post_tags' => 'Bien Inmobiliario,estados,Mexico',
                'created_at' => '2023-07-06 07:56:20',
            ],

              // Post 3
              [
                'blogcat_id' => 5,  // Estados
                'user_id' => 1,     // Admin
                'post_title' => 'Baja California Norte',
                'post_slug' => 'baja-california-norte',
                'post_image' => 'upload/post/post3.jpg',

                'short_descp' => 'Baja California, oficialmente Estado Libre y Soberano de Baja California, el número 29, de los treinta y un estados que, junto con la Ciudad de México, conforman México.​ Su capital es Mexicali y su ciudad más poblada es Tijuana, cabecera del municipio homónimo, el más poblado del país.9​ Se encuentra dividido en siete municipios.',

                'long_descp' => '<p>Se ubica en la parte norte de la <a title="Pen&iacute;nsula de Baja California" href="https://es.wikipedia.org/wiki/Pen%C3%ADnsula_de_Baja_California">pen&iacute;nsula de Baja California</a> en la <a title="Regiones de M&eacute;xico" href="https://es.wikipedia.org/wiki/Regiones_de_M%C3%A9xico">regi&oacute;n</a> <a title="Noroeste de M&eacute;xico" href="https://es.wikipedia.org/wiki/Noroeste_de_M%C3%A9xico">noroeste del pa&iacute;s</a>. Limita al norte con el estado de <a title="California" href="https://es.wikipedia.org/wiki/California">California</a>, al este con los estados de <a title="Arizona" href="https://es.wikipedia.org/wiki/Arizona">Arizona</a> y <a title="Sonora" href="https://es.wikipedia.org/wiki/Sonora">Sonora</a> y con el <a class="mw-redirect" title="Mar de Cort&eacute;s" href="https://es.wikipedia.org/wiki/Mar_de_Cort%C3%A9s">golfo de California</a>, al sur con el estado de <a title="Baja California Sur" href="https://es.wikipedia.org/wiki/Baja_California_Sur">Baja California Sur</a> y al oeste con el <a title="Oc&eacute;ano Pac&iacute;fico" href="https://es.wikipedia.org/wiki/Oc%C3%A9ano_Pac%C3%ADfico">oc&eacute;ano Pac&iacute;fico</a>. Con 71 450&nbsp;km&sup2; representa el 3.6&nbsp;% del territorio nacional, siendo la duod&eacute;cima <a title="Anexo:Entidades federativas de M&eacute;xico" href="https://es.wikipedia.org/wiki/Anexo:Entidades_federativas_de_M%C3%A9xico">entidad federativa</a> <a title="Anexo:Entidades federativas de M&eacute;xico por superficie, poblaci&oacute;n y densidad" href="https://es.wikipedia.org/wiki/Anexo:Entidades_federativas_de_M%C3%A9xico_por_superficie,_poblaci%C3%B3n_y_densidad">m&aacute;s grande del pa&iacute;s</a>.</p>
                    <p>Su poblaci&oacute;n seg&uacute;n el Censo de 2020 es de 3 769 020 habitantes que presenta el 3&nbsp;% de la poblaci&oacute;n mexicana, siendo la decimocuarta entidad m&aacute;s poblada del pa&iacute;s, cercana al puesto medio de puesto diecisiete. Tambi&eacute;n es la d&eacute;cima cuarta entidad menos densamente poblada, tambi&eacute;n cercana al puesto medio.</p>
                    <p>Su <a title="&Iacute;ndice de desarrollo humano" href="https://es.wikipedia.org/wiki/%C3%8Dndice_de_desarrollo_humano">&Iacute;ndice de Desarrollo Humano</a> (IDH) es uno de los m&aacute;s altos de M&eacute;xico, el cuarto a nivel nacional, calificado como muy alto.​ Adem&aacute;s es la duod&eacute;cima entidad por <a title="Producto interno bruto" href="https://es.wikipedia.org/wiki/Producto_interno_bruto">producto interno bruto</a> (PIB)<sup id="cite_ref-11" class="reference separada"></sup>​ y decimotercera en competitividad seg&uacute;n datos del IMCO.​ Debido a su posici&oacute;n geogr&aacute;fica &mdash;colindante con <a title="Estados Unidos" href="https://es.wikipedia.org/wiki/Estados_Unidos">Estados Unidos</a>&mdash; permite un &aacute;rea de conexi&oacute;n comercial y cultural. Tambi&eacute;n es uno de los estados m&aacute;s visitados del pa&iacute;s. El <a title="Valle de Guadalupe (Baja California)" href="https://es.wikipedia.org/wiki/Valle_de_Guadalupe_(Baja_California)">valle de Guadalupe</a> (<a title="Municipio de Ensenada" href="https://es.wikipedia.org/wiki/Municipio_de_Ensenada">Ensenada</a>) es el mayor productor de vinos en M&eacute;xico, reconocido a nivel internacional.<sup>[<em><a title="Wikipedia:Verificabilidad" href="https://es.wikipedia.org/wiki/Wikipedia:Verificabilidad">cita&nbsp;requerida</a></em>]</sup></p>
                    <p>En 1931 el <a title="Territorio de Baja California" href="https://es.wikipedia.org/wiki/Territorio_de_Baja_California">Territorio de Baja California</a> &mdash;que hab&iacute;a sido constituido desde 1824&mdash; se dividi&oacute; y se form&oacute; el <a title="Territorio Norte de Baja California" href="https://es.wikipedia.org/wiki/Territorio_Norte_de_Baja_California">Territorio Norte de Baja California</a>. Dicho <a title="Territorios federales de M&eacute;xico" href="https://es.wikipedia.org/wiki/Territorios_federales_de_M%C3%A9xico">territorio federal</a> fue elevado de rango a estado libre y soberano el 16 de enero de 1952.</p>',

                'post_tags' => 'Bien Inmobiliario,estados,Mexico',
                'created_at' => '2023-07-06 11:16:35',
            ],

         ]);
    }
}
