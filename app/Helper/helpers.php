
<?php 
   
    function todo(){
        return 'Hello World ';
    }
    function message($msg=''){
        if($msg==='')
            return "There is no Message To Show";
        return $msg;
    }
    // enum UserStatus: string
    // {
    //     case Pending = 'P';
    //     case Active = 'A';
    //     case Suspended = 'S';
    //     case CanceledByUser = 'C';
    
    //     public function label(): string
    //     {
    //         return match($this) {
    //             static::Pending => 'Pending',
    //             static::Active => 'Active',
    //             static::Suspended => 'Suspended',
    //             static::CanceledByUser => 'Canceled by user',
    //         };
    //     }
    // }
    enum TaskStatusEnum:string {
        case Todo = 'Todo';
        case InProgress = 'InProgress';
        case Testing = 'Testing';
        case Completed = 'Completed';
        
        public static function values(): array
        {
            return array_column(self::cases(), 'name', 'value');
        }
    }
?>