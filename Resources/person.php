<?php

namespace rva_resources
{
	/**
	 * person short summary.
	 *
	 * person description.
	 *
	 * @version 1.0
	 * @author alan
	 */
	class person
	{
		public prefix;
		public FirstName;
		public MiddleName;
		Public LastName;
		public Suffix;
		
		public system_id;	//15 character unique identifier of person
		public memberof;	//numeric provider id that they are a member of.
		
		
		function __construct(system_id){
			//find the person in the system.
			/*if they exist and belong to a member organization and have a role that permits edits to their organization and they are authenticated, enable edits to their organization.
			  They are otherwise a member of the public and have browse access to the site.
			*/
		}
	}
}
