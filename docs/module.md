## Module

### Настройки модуля

'admin-panel'=>[
        'class'=>'devskyfly\yiiModuleAdminPanel\Module',
        'upload_dir'=>'@app/upload',
        'search_settings'=>[
            'elastic_hosts'=>'http://127.0.0.1:9200',
            'index'=>'common_search',
            'document'=>'common_search_document',
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