<?php
	class ClassName 
	{ 
		public $absolute;
		public $relative;
		public $hundred;
		public $nominal;
		public function __construct($new , $unit)
		{ 
			$this->absolute = $new / $unit;
			$this->relative = $this->absolute - 1;
			$this->hundred = $this->absolute * 100;
			if ( $this->hundred > 0)
			{
				$this->nominal = 'positive';
			}
			elseif ( $this->hundred < 0 )
			{
				$this->nominal = 'negative';
			}
		}
	}
?>