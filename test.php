<?php


class TimeKeeper {

    const TIME_REG = '12:00';
    const TIME_DEPARTURE = '11:00';
    const DATETIME_FILTER_PATTERN = '#^([2]{1}[0-9]{3})-([0-1]{1}[0-9]{1})-([0-3]{1}[0-9]{1})[\s]{1}([0-5]{1}[0-9]{1})[\:]{1}([0-5]{1}[0-9]{1})[\:]{1}([0-5]{1}[0-9]{1})$#';
    const DATETM_FILTER_PATTERN = '#^([2]{1}[0-9]{3})-([01]{1}[0-9]{1})-([0-3]{1}[0-9]{1})[\s]{1}([0-5]{1}[0-9]{1})[\:]{1}([0-5]{1}[0-9]{1})$#';
    const DATE_FILTER_PATTERN = '#^([2]{1}[0-9]{3})-([0-1]{1}[0-9]{1})-([0-1]{1}[0-9]{1})$#';
    const DATE_REV_FILTER_PATTERN = '#^([0-1]{1}[0-9]{1})-([0-1]{1}[0-9]{1})-([2]{1}[0-9]{3})$#';
    
    /**
     * Compute date when visiter will be departure
     * @start date
     * @duration int - quantity visit days  
     * @return datetime
     */
    public static function calcHourlyDeparture($start = '', $duration = 0)
    {
        if (!self::isDateTmString($start))
            return false;
                
        $ob_date = new DateTime($start);
        $ob_date->add(new DateInterval('PT'.$duration.'H'));
        return $ob_date->format('Y-m-d H:i:s');
    }
    
        
    /*
     * This function prepare date string 'Y-m-d' for use with datetime queries to 
     * database with added initial time self::TIME_REG
     */
    public static function dailyStartDatetimePrepare($date='')
    {       
        if (!self::isDateString($date))
            return false;
        
        $ob_date = new DateTime($date);
        $time = self::TIME_REG;
        $ob_time = new DateTime($time);
        $time = $ob_time->format('H');
        $ob_date->add(new DateInterval('PT'.$time .'H'));
        return $ob_date->format('Y-m-d H:i:s');
    }
    
        /*
     * This function prepare date string 'Y-m-d' for use with datetime queries to 
     * database with added time self::TIME_DEPARTURE
     */
    public static function dailyFinishDatetimePrepare($date='')
    {
        if (!self::isDateString($date))
            return false;
        
        $ob_date = new DateTime($date);
        $time = self::TIME_DEPARTURE;
        $ob_time = new DateTime($time);
        $time = $ob_time->format('H');
        $ob_date->add(new DateInterval('PT'.$time .'H'));
        return $ob_date->format('Y-m-d H:i:s');
    }
    
        /*
     * Return true if datetime with 'Y-m-d h:i' format
     */
    public static function isDateTmString($string='')
    {
        if (@preg_match(self::DATETM_FILTER_PATTERN, $string))
             return true;
         else
             return false;
    }
    
    /*
     * Return true if datetime with only 'Y-m-d h:i:s' format
     */
    public static function isDateTimeString($string='') 
    {
        if (@preg_match(self::DATETIME_FILTER_PATTERN, $string))
             return true;
         else
             return false;
    }
    
    /*
     * Return true if string is date 'Y-m-d' or 'd-m-Y' formats
     */
    public static function isDateString($string='') 
    {
        if (@preg_match(self::DATE_FILTER_PATTERN, $string) ||
                (@preg_match(self::DATE_REV_FILTER_PATTERN, $string)))
             return true;
         else
             return false;
    }
}

$sta = '2016-02-12 10:00';
$date = '2016-02-14';
$date_rev = '14-02-2016';
$t_fin = '11:00';
$t_sta = '12:00';
$start = '2016-02-11 09:07:00';
$finish = '2016-02-12 08:59:59';
$hours = 2;

echo "<pre>";
echo "<br>Result (isDateString): ". TimeKeeper::isDateString($date);
echo "<br>Result (dailyStartDatetimePrepare): ".TimeKeeper::dailyStartDatetimePrepare($date);
echo "<br>Result (dailyFinishDatetimePrepare): ". TimeKeeper::dailyFinishDatetimePrepare($date_rev);
echo "</pre><br>";