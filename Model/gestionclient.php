<?php
	class client
    {
		private $firstname=null;
		private $lastname=null;
		private $sexe=null;
		private $email=null;
		private $password=null;
		
		

		function __construct($firstname, $lastname, $sexe, $email, $password)
        {
			$this->firstname=$firstname;
			$this->lastname=$lastname;
			$this->sexe=$sexe;
            $this->email=$email;
			$this->password=$password;
			
			
		}
		function getfirstname()
        {
			return $this->firstname;
		}
		function getlastname()
        {
			return $this->lastname;
		}
		function getsexe()
        {
			return $this->sexe;
		}
		function getemail()
        {
			return $this->email;
		}
		function getpassword()
        {
			return $this->password;
		}
		
		function setfirstname(text $firstname)
        {
			$this->firstname=$firstname;
		}
		function setlastname(text $lastname)
        {
			$this->lastname=$lastname;
		}
		function setsexe(text $sexe)
        {
			$this->sexe=$sexe;
		}
		function setemail(text $email)
        {
			$this->email=$email;
		}
        function setpassword(text $password)
        {
			$this->password=$password;
		}
		
		
	}


?>