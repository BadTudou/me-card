> MeCard is a data file similar to vCard but used by NTT DoCoMo in Japan in QR code format for use with Cellular Phones

# Install
```
composer require badtudou/me-card
```

# Usage
```
use BadTudou\MeCard\MeCard;

public function testReader()
{ 
    $data = 'MECARD:N:Mike;TEL:123 4567 8901;;';
    $mecard = BadTudou\MeCard\Reader::read($data);
    
    /* or
      $data = 'MECARD:N:Mike;TEL:123 4567 8901;;';
      $mecard = new BadTudou\MeCard\MeCard($data);
      $mecard->get();
    */
    
	/*
  [
     "N" => "Mike",
     "TEL" => "123 4567 8901",
   ]
   */
}

public function testSerialize()
{
   $data = 'MECARD:N:Mike;TEL:123 4567 8901;;';
   $mecard = new BadTudou\MeCard\MeCard($data);
   $mecard->serialize();
   /*
   "MECARD:N:Mike;TEL:123 4567 8901;;"
   */
 }
 
 public function testSetAndGet()
 {
   $data = 'MECARD:N:Mike;TEL:123 4567 8901;;';
   $mecard = new BadTudou\MeCard\MeCard($data);
   
   $mecard->get('N');
   /*
   "Mike"
   */
   
   $mecard->set('N', 'Jane');
   $mecard->get('N');
   /*
   "Jane"
   */
   
   $mecard->get();
   /*
   [
     "N" => "Jane",
     "TEL" => "123 4567 8901",
   ]
   */
 }
 
```
