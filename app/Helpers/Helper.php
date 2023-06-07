<?php

namespace App\Helpers;

use DateTime;
use App\Models\Review;
use App\Models\Produit;
use Illuminate\Support\Str;
use App\Services\Setting\General;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;


class Helper
{

    /**
     * Helper princpial de l'application
     */
    public static function front_image(string $imagePath)
    {
        return asset("frontend/img/" . $imagePath);
    }

    public static function back_image(string $imagePath)
    {
        return asset("backend/images" . $imagePath);
    }



    /**
     * Vérifier si des données|clés sont définis
     *
     * @param array|string|null $keys
     * @return integer
     */
    public static function validate(array|string $keys = null): bool
    {
        $c = 0;
        if (is_string($keys)) {
            if (!isset($keys) || is_null($keys) || empty(trim($keys))) {
                $c +=  1;
            } else {
                $c +=  0;
            }
        }

        if (is_array($keys)) {
            foreach ($keys as $k) {
                if (!isset($k) || is_null($k) || empty(($k))) {
                    $c +=  1;
                } else {
                    $c +=  0;
                }
            }
        }

        return ($c > 0) ? true : false;
    }


    /**
     * Vérifier si un élément existe en BD
     *
     * @param string $table
     * @param string|integer $Id
     * @param string $field
     * @return boolean
     */
    public static function existThis(string $table, string $field = null, string|int $Id = null, $statusField = "deleted", $statut = 0)
    {
        $row =  DB::table($table)->where([$field => $Id, $statusField => $statut])->first();
        return (!is_null($row)) ? true : false;
    }


    /**
     * Verifie si deux valeurs correspondent
     *
     * @param string|integer $first_value
     * @param string|integer $second_value
     * @return void
     */
    public static  function match(string|int $first_value = null, string|int $second_value = null)
    {
        if (is_int($first_value)) {
            if ((int) ($first_value) === (int) ($second_value)) {
                return true;
            }
        }

        if (is_string($first_value)) {
            if (trim($first_value) === trim($second_value)) {
                return true;
            }
        }
        return false;
    }

    // public static function setting()
    // {
    //     return (new General)->getSettings();
    // }


    /**
     * Fonction magique pour inserer des retour  la ligne à un texte.
     *
     * @param string $text
     * @return mixed
     */
    public static function formatText($text = null)
    {

        if ($text) {
            return str_replace(["\n", "\n\n", "\n\n\n"], "<br>", $text);
        } else {
            return null;
        }
    }
    public static function encodeText(string $longText = null)
    {
        if ($longText) {
            return str_replace("<br>", "\n", $longText);
        } else {
            return null;
        }
    }
    /**
     * Fonction pour formater un Montant d'argent: 25000 => 25 000
     *
     * @param integer $money
     * @return void
     */
    public static function moneyFormat(int $money  = null)
    {
        (int) $money = (int) $money;
        return isset($money)  ? number_format($money, 0, '', ' ') : 'indéfini';
    }

    public static function phone($phone)
    {
        (int) $phone = (int) $phone;
        return isset($phone)  ? number_format($phone, 0, '-', ' ') : 'indéfini';
    }
    /**
     * Les pages du site
     *
     * @return array
     */
    public static function pages(): array
    {
        $pages = [
            "contact",
            "opportunite",
            "prestation",
            "presentation",
            "realisation",
        ];
        return $pages;
    }
    /**
     * Remplacer les carctères spéciaux par des lettes simples
     *
     * @param [type] $text
     * @return string
     */
    public static  function replaceString($text)
    {
        $utf8 = array(
            // '/[:.;,!]/u' => '',
            '/[áàâãªä]/u' => 'a',
            '/[ÁÀÂÃÄ]/u' => 'A',
            '/[ÍÌÎÏ]/u' => 'I',
            '/[íìîï]/u' => 'i',
            '/[éèêëè]/u' => 'e',
            '/[ÉÈÊË]/u' => 'E',
            '/[óòôõºö]/u' => 'o',
            '/[ÓÒÔÕÖ]/u' => 'O',
            '/[úùûü]/u' => 'u',
            '/[ÚÙÛÜ]/u' => 'U',
            '/ç/' => 'c',
            '/Ç/' => 'C',
            '/ñ/' => 'n',
            '/Ñ/' => 'N',
            '/---/' => '',
            '/----/' => '',
            '/--/' => ''
        );
        //
        //
        return preg_replace(array_keys($utf8), array_values($utf8), $text);
    }


    /**
     * Remplacer les espaces des séparateurs
     *
     * @param [type] $string
     * @return mixed
     */
    public static function filterstring($string)
    {
        return strtolower(self::replaceString(str_replace([' ', '?', '&', "  ", '#', '+', 'x', '*', '.', "@", ";", ",", "/", "'", ":"], '-', str_replace(['--', '---', '----'], '-', $string))));
    }


    public static function filetype($filename)
    {
        $fileType = null;
        if (isset($filename)) {
            $WordFiles = array("docs", "docx", "doc");
            $ExcelFiles = array("xlx", "xl", "xls", "xlsx");
            $ArchiveFiles = array("zip", "rar", "rar4");
            $MediaFiles = array("png", "jpeg", "jpg", "gif", "ico");
            $PdfFiles = array("PDF", "pdf", "pd", "ft");
            $PowerPFile = array("pptx", "ppt", "ppts");
            $code = array("PHP", "php", "JS");
            $AI = array("ai", "AI", "EPS", 'eps');
            $PS = array("PSD", "ps", "psd");
            $explode = explode(".", $filename);
            $fileExtension = end($explode);

            if (in_array($fileExtension, $code)) {
                $fileType = "PHP";
            }
            if (in_array($fileExtension, $AI)) {
                $fileType = "Adobe Illustrator";
            }
            if (in_array($fileExtension, $PS)) {
                $fileType = "Adobe Photoshop";
            }
            if (in_array($fileExtension, $WordFiles)) {
                $fileType = "Word";
            }
            if (in_array($fileExtension, $ExcelFiles)) {
                $fileType = "Excel";
            }
            if (in_array($fileExtension, $ArchiveFiles)) {
                $fileType = "Zip";
            }
            if (in_array($fileExtension, $MediaFiles)) {
                $fileType = "Image";
            }
            if (in_array($fileExtension, $PdfFiles)) {
                $fileType = "PDF";
            }
            if (in_array($fileExtension, $PowerPFile)) {
                $fileType = "PowerPt";
            }
            return $fileType;
        }
    }


    public static function page_active(string $uri)
    {
        return ((trim(request()->path()) ===  $uri)) ? 'active' : '';
    }

    public static function page_contains(string $string)
    {
        $exp =  explode('/', request()->path());
        $keyOne = (count($exp) > 1) ? $exp[1] : null;
        return (trim($exp[0]) ===  $string) || trim($keyOne) ===  $string ? 'active' : '';
    }


    /**
     * Undocumented function
     *
     * @param integer|null $statut
     * @return void
     */
    public static function statut(int $statut = null){
        $span = null;
        if($statut === 0){ $span = '<small class="badge bg-warning mob-block">   En cours  </small>';}
        
        if($statut === 1)  { $span = '<small class="badge bg-success mob-block">   Retenu(e)  </small>';}

        if($statut === 2){ $span = '<small class="badge bg-danger mob-block">   Refusé(e)  </small>' ;}
    
        if($statut === 3){ $span = '<small class="badge bg-archive mob-block"> Archivé </small>' ;}
        return $span;
    }



    public static function etat(int $statut = null){
        $span = null;
        if($statut === 0 || $statut == null){ $span = '<small class="badge bg-pending mob-block">   Non attribué(e)  </small>';}
        
        if($statut === 1)  { $span = '<small class="badge bg-done mob-block">   Attribué(e)  </small>';}

        if($statut === 2){ $span = '<small class="badge bg-none mob-block">   Refusé(e)  </small>' ;}
        if($statut === 3){ $span = '<small class="badge bg-archive mob-block"> Archive(e)  </small>' ;}
        if($statut === 4){ $span = '<small class="badge bg-error mob-block"> Supprimé(e)  </small>' ;}
        return $span;
    }

    public static function valide(int $statut = null){
        $span = null;
        if($statut === 0 || $statut == null){ $span = '<small class="badge bg-pending mob-block">   Inactif  </small>';}
        
        if($statut === 1)  { $span = '<small class="badge bg-done mob-block">   Actif  </small>';}

        if($statut === 2){ $span = '<small class="badge bg-none mob-block">   Désactiver  </small>' ;}
        if($statut === 3){ $span = '<small class="badge bg-archive mob-block"> Archive(e)  </small>' ;}
        if($statut === 4){ $span = '<small class="badge bg-error mob-block"> Supprimé(e)  </small>' ;}
        return $span;
    }


    public static function modeBg(string $mode = null){
        $span = Str::lower(trim($mode));
        if($mode === "temporaire"|| $mode == null){ 
            $span = '<small class="badge bg-temp mob-block"> <i class="bx bxs bx-timer"></i>'.Str::ucfirst($mode).' </small>';
        }else{
            $span = '<small class="badge bg-full mob-block"><i class="bx bxs bx-timer"></i>'.Str::ucfirst($mode).'   </small>';
        }
        return $span;
    }

    public static function avatar(string $civilite = null){
        $img = null;
        $civilite = Str::lower(trim($civilite));
        if($civilite === "mlle." || $civilite === "mme." || $civilite === "mlle" || $civilite === "mme"){ 
            $img = '<img src="'.asset('backend/assets/img/female.png').'" alt="" class="img-fluid" width="50">' ;
        }else{
            $img = '<img src="'.asset('backend/assets/img/male.png').'" alt="" class="img-fluid" width="50">';
        }
        return $img;
    }

    public static function genre(string $civilite = null){
        $civilite = Str::lower(trim($civilite));
        if($civilite === "mlle." || $civilite === "mme." || $civilite === "mlle" || $civilite === "mme"  ){ 
            return '<strong class="d-block text-femme">Femme </strong>' ;
        }else{
            return '<strong class="d-block text-homme">Homme </strong>';
        }
        return null;
    }





    public static function statutText(int $statut)
    {
        return $statut === 1  ? '<i class="fa fa-times"></i> Refuser l\'adhésion' : ' <i class="fa fa-check"> </i> Valider l\'adhésion ';
    }


    public static function class(int $statut)
    {
        $class = ["bg" => null, "text" => null, "color" => null];
        ($statut === 1)  ?

            $class = ["bg" => "bg-success text-white", "text" => "Actif", "color" => "text-success ", "icon" => "mdi mdi-power", "action" => "Désactiver"] :
            $class = ["bg" => "bg-warning text-dark", "text" => "Inactif", "color" => "text-dark ", "icon" => "mdi mdi-power-off", "action" => "Activer"];

        return $class;
    }


    public static function prettyCols(int $count, $array)
    {
        $searchArray = [3, 5, 7, 9, 11, 13, 15, 17, 19, 21, 23, 25, 27, 29, 31];
        $kye_last = 0;

        foreach ($array as $k => $ar) {
        }
        if (in_array($count, $searchArray)) {
            if ($count === array_key_last($array)) {
                return array_key_last($array); //"col-lg-12 col-md-12 col-sm-12";
            } else {
                return array_key_last($array); //"col-lg-6 col-md-6 col-sm-6";
            }
        }
    }


    /**
     * Ecraser la session
     *
     * @return void
     */
    public static function close()
    {
        Cookie::queue(Cookie::forget('user_email'));
        Cookie::queue(Cookie::forget('user_id'));
        Cookie::queue(Cookie::forget('user_type'));
        Cookie::queue(Cookie::forget('user_name'));
        Cookie::queue(Cookie::forget('user_ip'));

        //* Vider la Session
        Session::pull('user_email');
        Session::pull('user_id');
        Session::pull('user_type');
        //* Rédirection vers la page de connexion:
        //return true;
    }

    // public static function cookie(array|object $datas)
    // {
    //     if (!AuthHelper::activeSession()) {
    //         Cookie::queue('user_email', $datas->author_email, 6000); // Durée de 24H +
    //         Cookie::queue('user_id', $datas->id, 6000); // Durée de 24H +
    //         Cookie::queue('user_type', 0, 6000); // Durée de 24H +
    //         Cookie::queue("user_name", $datas->author_name, 6000);
    //         Cookie::queue("user_ip", request()->ip(), 6000);
    //     }
    //     return true;
    // }


    public static function likeCookies()
    {
        //if(!AuthHelper::activeSession()){
        Cookie::queue("has_liked", true, 12000);
        Cookie::queue("user_ip", request()->ip(), 12000);
        //}
        return true;
    }

    /**
     * Incrementter le nombre de vue d'un article:
     *
     * @param string $table
     * @param string $idField
     * @param [type] $id
     * @return void
     */
    public static function incrementView($id, $table = "articles", $idField = "id")
    {
        $article = DB::table($table)->where([$idField => $id])->first();
        if (!is_null($article)) {
            $array = ["vue" => $article->vue + 1];
        }
        return DB::table($table)->where([$idField => $id])->update($array);
    }


    public static function ratingItem($note = 0)
    {
        $html = "";
        $class = "fal";
        for ($i = 0; $i < 5; $i++) {
            $class =  ($i < $note) ? "fas" : "fal";
            $html .= '<li><a href="#"><i class="' . $class . ' fa-star"></i></a></li>';
        }
        return $html;
    }




    public static function note(int $note = 0)
    {
        $noteText = "Mauvais";
        switch ($note) {
            case 1:
                $noteText = "Très Mauvais";
                break;
            case 2:
                $noteText = "Médiocre";
                break;
            case 3:
                $noteText = "Pas mal";
                break;
            case 4:
                $noteText = "Bon";
                break;
            case 5:
                $noteText = "Très Bon";
                break;
            default:
                $noteText = "Mauvais";
                break;
        }
        return $noteText;
    }


    /**
     * Calcule le pourcentage d'une valeur dans un total
     *
     * @param integer $total
     * @param integer $count
     * @return mixed
     */
    public static function purcentage(int $total, int $count = 1)
    {
        return round(($count * 100) / $total);
    }

    public static function legend(string|int $string = 0)
    {
        switch ($string) {
            case 0:
                return ["text" => "Commande en cours", "color" => "#556ee6"];
                break;
            case 1:
                return ["text" => "Commande Validées", "color" => "#34c38f"];;
                break;
            case 2:
                return ["text" => "Commande annulées", "color" => "#f46a6a"];
                break;

            default:
                return ["text" => "Commande en cours", "color" => "#556ee6"];
                break;
        }
    }


    public static function legendTwo(string|int $string = 0)
    {
        switch ($string) {
            case 0:
                return ["text" => "En cours", "color" => "#556ee6"];
                break;
            case 1:
                return ["text" => "Validées", "color" => "#34c38f"];;
                break;
            case 2:
                return ["text" => "Annulées", "color" => "#f46a6a"];
                break;

            default:
                return ["text" => "En cours", "color" => "#556ee6"];
                break;
        }
    }



    public static function color($classe = null)
    {
        for ($i = 0; $i < 25; $i++) :
            switch ($classe) {
                case 1:
                    return "#198a00";
                    break;
                case 2:
                    return "#69115f";
                    break;
                case 3:
                    return "#0007ce";
                    break;
                case 4:
                    return "#eab202";
                    break;
                case 5:
                    return "#007162";
                    break;
                case 6:
                    return "#1d1d1d";
                    break;
                case 7:
                    return "#630101";
                    break;
                case 8:
                    return "#698547";
                    break;
                case 9:
                    return "#f0efbb";
                    break;
                case 10:
                    return "#bb20bb";
                    break;
                case 11:
                    return "#ccffff";
                    break;
                case 12:
                    return "#0d6efd";
                    break;
                case 13:
                    return "#20c997";
                    break;
                case 14:
                    return "#6c757d";
                    break;
                case 15:
                    return "#eff452";
                    break;
                case 16:
                    return "#0dcaf0";
                    break;
                case 17:
                    return "#6f42c1";
                    break;
                case 18:
                    return "#00acee";
                    break;
                case 19:
                    return "#ffab10";
                    break;
                case 20:
                    return "#11b76b";
                    break;
                case 21:
                    return "#0dfdb0";
                    break;
                case 22:
                    return "#ff4747";
                    break;
                default:
                    return "#ff6f00";
                    break;
            }
        endfor;
    }


    // public static function numero(string $table =  "adhesions"){
    //     $id = (new General)->lastId($table);
    //     $length =  (!is_null($id)) ? strlen((string) $id) : 1;
    //     if ($length === 1) {
    //         $string  = "AS-000".$id+1;
    //     }
    //     if ($length === 2) {
    //         $string  = "AS-00".$id+1;
    //     }
    //     if ($length === 3) {
    //         $string  = "AS-0".$id+1;
    //     }
    //     if ($length >= 4) {
    //         $string  = "AS-".$id+1;
    //     }
    //     return $string;
    // }

    public static function age($date){
        $d1 = new DateTime(date("Y-m-d"));
        $d2 = new DateTime($date);
        $diff = $d2->diff($d1);
        return  $diff->y;
    }

    public static function previous_url(){
        $exp =explode("/", URL::previous());
        $exp = isset($exp[4])  ? explode("?", trim($exp[4])) : "dashboard";
        $url = isset($exp[0]) ? $exp[0]: "dashboard";
        $prev = (trim(URL::previous()) === url("/")) ? "dashboard" : $url;
        return $prev;
    }

    public static function getGender(string $civilite = null){
        if(Str::lower(trim($civilite)) === "m."){
            return "homme";
        }else{
            return "femme";
        }
    }
}
