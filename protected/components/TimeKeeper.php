<?php

/**
 * Description of TimeKeeper
 * TimeKeeper this is helper class for prepare and handle datatime string for 
 * communication yii application with database datetime columns.  
 * All return string will be in sql applycable datetime format 'yyyy-mm-dd hh:mm:ss' 
 *
 * @author tvitcom
 * @url https://github.com/tvitcom
 */
class TimeKeeper {

    const TIME_REG = '12:00';
    const TIME_DEPARTURE = '11:00';
    const DATETIME_FILTER_PATTERN = '#^([2]{1}[0-9]{3})-([0-1]{1}[0-9]{1})-([0-3]{1}[0-9]{1})[\s]{1}([0-5]{1}[0-9]{1})[\:]{1}([0-5]{1}[0-9]{1})[\:]{1}([0-5]{1}[0-9]{1})$#';
    const DATETM_FILTER_PATTERN = '#^([2]{1}[0-9]{3})-([01]{1}[0-9]{1})-([0-3]{1}[0-9]{1})[\s]{1}([0-5]{1}[0-9]{1})[\:]{1}([0-5]{1}[0-9]{1})$#';
    const DATE_FILTER_PATTERN = '#^([2]{1}[0-9]{3})-([0-1]{1}[0-9]{1})-([0-1]{1}[0-9]{1})$#';
    const DATE_REV_FILTER_PATTERN = '#^([0-3]{1}[0-9]{1})-([0-1]{1}[0-9]{1})-([2]{1}[0-9]{3})$#';
        
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
                
        $obDateTime = new DateTime($start);
        $obDateTime->add(new DateInterval('PT'.(int) $duration.'H'));
        return $obDateTime->format('Y-m-d H:i:s');
    }
    
        
    /*
     * This function prepare date string for use with datetime queries to 
     * database with added initial time self::TIME_REG
     */
    public static function dailyStartDatetimePrepare($date=''/*, $format='Y-m-d'*/)
    {       
        if (!self::isDateString($date))
            return false;
        
        $obDate = new DateTime($date);
	//$obDate = $obDate->format($format);
        $time = self::TIME_REG;
        $obTime = new DateTime($time);
        $time = $obTime->format('H');
        $obDate->add(new DateInterval('PT'.$time .'H'));
        return $obDate->format('Y-m-d H:i:s');
    }
    
    /*
     * This function prepare date string 'Y-m-d' for use with datetime queries to 
     * database with added time self::TIME_DEPARTURE
     */
    public static function dailyFinishDatetimePrepare($date='')
    {
        if (!self::isDateString($date))
            return false;
        
        $obDate = new DateTime($date);
        $time = self::TIME_DEPARTURE;
        $obTime = new DateTime($time);
        $time = $obTime->format('H');
        $obDate->add(new DateInterval('PT'.$time .'H'));
        return $obDate->format('Y-m-d H:i:s');
    }
    
    /*
     * Return @integer quantity days among two datetime variables
     */
    public static function totalDays($start='',$finish='') 
    {
        if (!self::isDateString($start) || (!self::isDateString($finish)))
            return false;
        
        $obStart = new DateTime($start);
        $obFinish = new DateTime($finish);
        
        if(($obstart instanceOf DateTime) && ($obFinish instanceof DateTime)) {
            $interval = $obStart->diff($obFinish);
            return $interval->format('%a');
        }
        return false;
    }
    
    /*
     * @datetime str - Return datetime 'Y-m-d H:i:s' string for use database fields.
     * @datetm incoming string in 'Y-m-d H:i' formats.
     */
    public static function toDateTime($date_tm = '')
    {
        if (!self::isDateTmString($date))
            return false;
                
        $obDatetime = new DateTime($date_tm);
        return $obDatetime->format('Y-m-d H:i:s');
    }
        
    /*
     * Return true if datetime with 'Y-m-d h:i' format called as datetm 
     * (not full notation)
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