## Module

### Настройки модуля

```php
'admin-panel'=>[
        'class'=>'devskyfly\yiiModuleAdminPanel\Module',
        
        //common
        'upload_dir'=>'@app/upload',
        
        //search
        'search_settings'=>[
            'elastic_hosts'=>'http://127.0.0.1:9200',
            'index'=>'common_search',
            'index_settings'=>[],
            'type'=>'common_search_document',
            'type_mappings'=>[
	    			'properties'=> [
			            'name'=>[
			                'type'=>'text',
			                'analyzer'=>"russian_morphology" ,
			                'search_analyzer'=>"russian_morphology"
			            ],
			            'content'=>[
			                'type'=>'text',
			                'analyzer'=>"russian_morphology" ,
			                'search_analyzer'=>"russian_morphology",
			            ],
			            'route'=>['type'=>'text']
			        ]
		     ],
            'client_settings'=>[
                'client'=>[
                     'curl'=>[
                         CURLOPT_PROXY=>'',
                         CURLOPT_HTTPPROXYTUNNEL=>false
                     ]
                 ] 
            ]
        ]
        
    ]
```