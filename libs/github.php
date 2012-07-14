<?php
/**
 * 
 */
class GitHub extends Curl
{
	public $git_username;
	public $delimiter;
	public $use_cache;
	public $cache_duration;

	/*
	 * Set configuration variables
	 */
	public function __construct()
	{
		$this->git_username = GIT_USERNAME;
		$this->delimiter = PATH_DELIMITER;
		$this->use_cache = USE_CACHE;
		$this->cache_duration = CACHE_DURATION;
	}

	/**
	 * Convert the path_string to a valid path
	 * @params $path_string (use a '-' as '/' and '_' as a '.')
	 * @returns a valid path
	 * 
	 * Example:
	 * css-layout-style_css becomes css/layout/style.css
	 */
	public function build_file_path($path_string)
	{	
		$path_array = explode($this->delimiter, $path_string);
		
		$path = '';
		
		foreach ($path_array as $segment) {
			$path .= '/' . str_replace('_', '.', $segment);
		}
		
		return $path;
	}
	
	/*
	 * Get file from the repository
	 * @params repository, file
	 * @returns file content
	 */
	public function getFile($repo, $file)
	{	
		$repo_file = NULL;
	
		if ($repo_file == NULL)
		{
			$url = 'repos/' . $this->git_username . '/' . $repo . '/contents'. $this->build_file_path($file);

			$repo_file = $this->getRequest($url);
		}
		
		return $repo_file;
	}
	
	public function getCommits($repo, $sha)
	{
		//GET /repos/:user/:repo/commits
		$comFile = NULL;
		$caSstring = '';
		$url_string = '';
		
		if($sha != NULL)
		{
			$caSstring = '_' . $sha;
			$url_string = '/' . $sha;
		}
		if ($comFile == NULL)
		{
			$url = 'repos/' . $this->git_username . '/' . $repo . '/commits' . $url_string;
			//echo $url; exit;
			$comFile = $this->getRequest($url);
		}
		
		if (is_array($comFile))
		{
			return json_encode($comFile, true);
		}
		else {
			return $comFile;
		}	
	}
	
	public function getRepository($repo)
	{
		//GET /repos/:user/:repo
		$repository = NULL;
                if ($repository == NULL)
		{
			$url = 'repos/' . $this->git_username . '/' . $repo;
			$repository = $this->getRequest($url);
		}
                
		if (is_array($repository))
		{
			return json_encode($repository, true);
		}
		else {
			return $repository;
		}
	}
        
        public function getRepositoryWithKeyword($keyword)
	{
		//GET /legacy/repos/search/:keyword
		$repository = NULL;
		
		if ($repository == NULL)
		{
			$url = 'legacy/repos/search/'. $keyword;

			$repository = $this->getRequest($url);
		}
		
		if (is_array($repository))
		{
			return json_encode($repository, true);
		}
		else {
			return $repository;
		}
	}
        
        public function getRepositoryAndKeyword($owner, $repo,$keyword)
	{
		//GET /legacy/repos/search/:keyword
		$repository = NULL;
		
		if ($repository == NULL)
		{
			$url = '/legacy/issues/search/'.$owner.'/'.$repo.'/open/'. $keyword;

			$repository = $this->getRequest($url);
		}
		
		if (is_array($repository))
		{
			return json_encode($repository, true);
		}
		else {
			return $repository;
		}
	}
}