<?php
/**
 * Created by PhpStorm.
 * User: pr0x
 * Date: 13/05/2015
 * Time: 10:36
 */
class HTML {
    //links
    static  function button_primary($content) {
        return self::button($content,'','','button-primary');
    }
    static  function button_success($content) {
        return self::button($content,'','','btn btn-success');
    }
    static function btn($content,$href='',$urlicon='',$class='',$attrs = array()) {
        if($href) {
            return self::link($content,$href,"btn btn-default $class",$urlicon,true,$attrs);
        } else return self::__button($content,$href,"btn $class",$attrs);
    }
    static function btnB30($content,$href='',$icon='',$class='',$attrs = array()) {
        if($icon) $icon = "glyphicon glyphicon-".$icon;
        return self::link($content,$href,"btn btn-default $class",$icon,true,$attrs);
    }
    static function btnB30_modal($content,$modal='',$icon='',$class='',$attrs = array()) {
        $attrs['data-toggle'] = 'modal';
        return self::btnB30($content,'#'.$modal,$icon,$class,$attrs);
    }
    static function button($content,$href='',$urlicon='',$class='') {
        if($href) {
            self::link($content,$href,"button $class",$urlicon);
        } return self::__button($content,$href,"button $class");
    }
    static function __button($content,$urlicon='',$class='') {
        return "<button class='$class'>$urlicon$content</button>";
    }
    static function link_buttonVM($content,$page,$view='',$viewmodel='',$id='',$class='button',$urlicon='',$isicon=true,$attrs=array()) {
        if($view) $view = "&view=$view";
        if($viewmodel) $viewmodel = "&viewmodel=$viewmodel";
        if($id) $id = "&id=$id";
        $href = "?page=$page$view$viewmodel$id";
        return self::__link($content,$href,$class,$urlicon,$isicon,$attrs);
    }
    static function link_buttonCA($content,$page,$controller,$action,$class='button',$urlicon='',$isicon=true,$attrs=array()) {
        $href = "?page=$page&controller=$controller.$action";
        return self::__link($content,$href,$class,$urlicon,$isicon,$attrs);
    }
    static function link($content='',$href='#',$class='',$urlicon='',$isicon=true,$attrs = array()) {
        return self::__link($content,$href,$class,$urlicon,$isicon,$attrs);
    }
    static function __link($content='',$href='#',$class='',$urlicon='',$isicon='',$attrs = array()) {
        $icon = self::__get_icon($urlicon,$isicon);
        $attrhtml = '';
        foreach($attrs as $attr => $v) {
            $attrhtml.=" $attr = '$v'";
        }
        return "<a class='$class' href='$href' $attrhtml>$icon $content</a>";
    }
    static function __get_icon($urlicon,$isicon) {
        if($urlicon) {
            if($isicon ) $urlicon = "<span class='$urlicon'></span>";
            else $urlicon = "<img src='".SIGER_URL_ASSETIC."/$urlicon'>";
        }
        return $urlicon;
    }

    //string
    static function truncate($str,$count = 100) {
        if(strlen($str)>$count)
            $str = substr($str,0,$count).'...';
        return $str;
    }

    //images
    static function test_img($width=140,$height=140) {
        return '<img style="width: '.$width.'px; height: '.$height.'px; margin-bottom:10px" data-src="holder.js/140x140" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAIwAAACMCAYAAACuwEE+AAACdUlEQVR4nO3YMW7iQBiA0dz/KO7cuaGjo6T3EXwFbzUoYVllP4lsYvYVr4ABTcT/eTB527Zth7/19t1/AMciGBLBkAiGRDAkgiERDIlgSARDIhgSwZAIhkQwJIIhEQyJYEgEQyIYEsGQCIZEMCSCIREMiWBIBEMiGBLBkAiGRDAkgiERDIlgSARDIhgSwZAIhkQwJIIhEQyJYEgEQyIYEsGQCIZEMCSCIREMiWBIBEMiGBLBkAiGRDAkgiERDIlgSARDIhgSwZAIhkQwJIIhEQzJSwSzLMs+TdPDtev1uk/TtJ/P59tz67ru0zTdrOv6o/f7SQ4fzPtBPFqf5/m3Ac7zvJ9Op9vw53n+sfv9NIcN5v1VO4Z0/5rz+Xx7zRjgOAEul8u+bdt+uVz2aZr26/V6WxvDPZ1Ot7Wv2O+7P8P/LphxpT76ihgDHkMcA7wf2Hg8BjoiGe8b8XzVfkdz2GDeezTAZVn2ZVk+DPLRAO9PgG37/Gvn2fsdyUsGM4a0ruunA3x0xY9TZpwuX73fkbxkMOPxvWVZPr2nGOvDo3uNZ+53NC8ZzHv3V/y2bR9Oj/tfLeOGdrzv0S+aZ+53NP9lMH/6v8i4YR2nwf0N7LP3O6KXCIZ/RzAkgiERDIlgSARDIhgSwZAIhkQwJIIhEQyJYEgEQyIYEsGQCIZEMCSCIREMiWBIBEMiGBLBkAiGRDAkgiERDIlgSARDIhgSwZAIhkQwJIIhEQyJYEgEQyIYEsGQCIZEMCSCIREMiWBIBEMiGBLBkAiGRDAkgiERDIlgSARDIhgSwZAIhkQwJIIhEQyJYEgEQyIYEsGQCIZEMCSCIfkFXTZF/8aAvbAAAAAASUVORK5CYII=" class="img-thumbnail" alt="140x140">';
    }

    static function getFoto($foto=null) {
        if(preg_match('/^http:|https:/',$foto))
            return $foto;
        return $foto? CS_MVC_URL_ASSETIC.'/../foto/'.$foto : "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAIwAAACMCAYAAACuwEE+AAACdUlEQVR4nO3YMW7iQBiA0dz/KO7cuaGjo6T3EXwFbzUoYVllP4lsYvYVr4ABTcT/eTB527Zth7/19t1/AMciGBLBkAiGRDAkgiERDIlgSARDIhgSwZAIhkQwJIIhEQyJYEgEQyIYEsGQCIZEMCSCIREMiWBIBEMiGBLBkAiGRDAkgiERDIlgSARDIhgSwZAIhkQwJIIhEQyJYEgEQyIYEsGQCIZEMCSCIREMiWBIBEMiGBLBkAiGRDAkgiERDIlgSARDIhgSwZAIhkQwJIIhEQzJSwSzLMs+TdPDtev1uk/TtJ/P59tz67ru0zTdrOv6o/f7SQ4fzPtBPFqf5/m3Ac7zvJ9Op9vw53n+sfv9NIcN5v1VO4Z0/5rz+Xx7zRjgOAEul8u+bdt+uVz2aZr26/V6WxvDPZ1Ot7Wv2O+7P8P/LphxpT76ihgDHkMcA7wf2Hg8BjoiGe8b8XzVfkdz2GDeezTAZVn2ZVk+DPLRAO9PgG37/Gvn2fsdyUsGM4a0ruunA3x0xY9TZpwuX73fkbxkMOPxvWVZPr2nGOvDo3uNZ+53NC8ZzHv3V/y2bR9Oj/tfLeOGdrzv0S+aZ+53NP9lMH/6v8i4YR2nwf0N7LP3O6KXCIZ/RzAkgiERDIlgSARDIhgSwZAIhkQwJIIhEQyJYEgEQyIYEsGQCIZEMCSCIREMiWBIBEMiGBLBkAiGRDAkgiERDIlgSARDIhgSwZAIhkQwJIIhEQyJYEgEQyIYEsGQCIZEMCSCIREMiWBIBEMiGBLBkAiGRDAkgiERDIlgSARDIhgSwZAIhkQwJIIhEQyJYEgEQyIYEsGQCIZEMCSCIfkFXTZF/8aAvbAAAAAASUVORK5CYII=" ;
    }


    //paginador
    static function pagination($total, $class="") {
        $count = 9;
        $npage = (int)($total/$count) + ($total%$count==0?0:1);
        $html = "<ol style='border: #0362FD 1px solid' class='breadcrumb $class'>";
        $html.="<li class='active'><button href='#' class='btn btn-primary'><b>Total de Alojaminetos ($total)</b></button></li>";
        if($npage>1) for($i = 0;$i<$npage;$i++) {
            $num = $i+1;
            $href = "./?start=".($i*$count);
            $is_active = Controller::in_num('start',0)==$i*$count?'btn-primary':'btn-default';
            $html.= "<li><button class='btn $is_active' href='$href'>$num</button></li>";
        }
        $html.="</ol>";
        return $html;
    }
    //list
    static function dropDownList($name,$items,$id,$attrs = array(),$placeholder="---") {
        $attrhtml = '';
        foreach($attrs as $attr => $v) {
            $attrhtml.=" $attr = '$v'";
        }
        $html = "<select $attrhtml name='$name'><option>$placeholder</option>";
        foreach($items as $item){
            $value = $item->id;$txt = __($item->__toString());
            $selected = $id==$value ? 'selected':'';
            $html.="<option $selected value='$value'>$txt</option>";
        }
        $html.="</select>";
        return $html;
    }

    static function listBox($name,$items,$id=0,$attrs = array()) {
        $attrhtml = '';
        foreach($attrs as $attr => $v) {
            $attrhtml.=" $attr = '$v'";
        }
        $html = "<select multiple $attrhtml name='$name'>";

        foreach($items as $item){
            $value = $item->id;$txt = __($item->__toString());
            $selected = $id==$value ? 'selected':'';
            $html.="<option $selected value='$value'>$txt</option>";
        }
        $html.="</select>";
        return $html;
    }

    static function dropDownListHiddenValue($name,$items,$id,$attrs = array(),$placeholder="---") {
        $attrhtml = '';
        $onchange = '';
        foreach($attrs as $attr => $v) {
            if(strtoupper($attr) == 'ONCHANGE')
                $onchange = $v;
            else
                $attrhtml.=" $attr = '$v'";
        }
        $html = "<select onchange=\"jQuery('input[name=$name]').val(jQuery(this).val()); $onchange \" $attrhtml><option>$placeholder</option>";
        foreach($items as $item){
            $value = $item->id;$txt = __($item->__toString());
            $selected = $id==$value ? 'selected':'';
            $html.="<option $selected value='$value'>$txt</option>";
        }
        $html.="<input name='$name' type='hidden' value='$id'>";
        $html.="</select>";
        return $html;
    }

    //qTranslator
    static function switcherLanguageInline() {
        global $q_config;
        $html="<ul class='qtranxs-lang-switch-wrap'>";
        foreach(qtranxf_getSortedLanguages() as $language) {
            $active = $language == $q_config['language']?'active':''; $url_flag = qtranxf_flag_location();
            $name = $q_config['language_name'][$language]; $flag = $q_config['flag'][$language];
            $html.="<li lang='$language' class='qtranxs-lang-switch $active'><img
                    src='$url_flag/$flag'>
                <span>$name</span>
            </li>";
        }
        $html.="</ul>";
        return $html;
    }

    static function _t($txt,$language='en') {
        $p = strpos($txt,"[:$language]");
        $flag = true;
        $output = '';
        for($i=$p+5;$i<strlen($txt) ;$i++) {
            if($txt{$i}=='[' && $txt{$i+1}==':') {
                break;
            }
            $output.=$txt{$i};
        }
        return $output;
    }

    static function listInputTranslate($name,$value,$type='input',$attrs=array()) {
        global $q_config;
        $attrhtml = '';
        foreach($attrs as $attr => $v) {
            $attrhtml.=" $attr = '$v'";
        }
        $html="<input type='hidden' name='$name' value='$value'>";
        foreach(qtranxf_getSortedLanguages() as $language) {
            $nvalue = self::_t($value,$language);
            $active = $language == $q_config['language']?'active':''; $url_flag = qtranxf_flag_location();
            $language_name = $q_config['language_name'][$language]; $flag = $q_config['flag'][$language];
            $html.="<li lang='$language' class='qtranxs-lang-switch'><img
                    src='$url_flag/$flag'>
                <span style='text-transform: uppercase'>$language</span>
            </li>";
            switch($type) {
                case 'textarea':
                    $html.="<textarea style='width: 100%' name='$name".'_'."$language' $attrhtml>$nvalue</textarea>";
                    break;
                case 'input':                    
                default:
                    $html.="<input type='text' name='$name".'_'."$language' $attrhtml value='$nvalue'><br>";
                    break;
            }
            
        }
        return $html;
    }
}
