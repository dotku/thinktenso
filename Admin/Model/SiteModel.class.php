<?
namespace Admin\Model;
use Think\Model;
class SiteModel extends Model {
    function login($name) {
        echo $this->fields['name'];
        $res = $this->query("select * from tns_site where prty_value='$name'");
        return $res;
    }
}