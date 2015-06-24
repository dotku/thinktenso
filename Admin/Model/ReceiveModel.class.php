<?
namespace Admin\Model;
use Think\Model;
class ReceiveModel extends Model {
    protected $_validate = array(
        //array('user_id', 'require', '客户编号必填'),
        //array('item_weight', 'require', '物品重量必填'),
        //array('clerk_name', 'require', '收货员姓名必填'),
    );
    protected $_auto = array(
        array('item_id', 'date', 1, 'function')
    );
    public function createItemId(){
        $data = M('receive');
        return $data -> max('item_id');
    }
}