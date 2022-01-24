<?php
/* declare{strict_types=1}; */

namespace BoundedContent\User\Domain\Aggregate;

abstract class AggrateRoot
{
	private $domainEvents=[];
	final public function pullDomainEvents()
	{
		$domainEvents = $this->domainEvents;
		$this->domainEvents = [];
		return $domainEvents;
	}
	final protected function record(Domain $domainEvents)
	{
		$this->domainEvents[] = $domainEvents;
	}
}
