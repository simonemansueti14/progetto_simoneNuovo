<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Le seguenti righe contengono i messaggi di errore predefiniti usati
    | dalla classe di validazione di Laravel. Sentiti libero di modificarle
    | in base alle esigenze della tua applicazione.
    |
    */

    'accepted'             => 'Il campo :attribute deve essere accettato.',
    'active_url'           => 'Il campo :attribute non è un URL valido.',
    'after'                => 'Il campo :attribute deve essere una data successiva a :date.',
    'after_or_equal'       => 'Il campo :attribute deve essere una data successiva o uguale a :date.',
    'alpha'                => 'Il campo :attribute può contenere solo lettere.',
    'alpha_dash'           => 'Il campo :attribute può contenere solo lettere, numeri, trattini e trattini bassi.',
    'alpha_num'            => 'Il campo :attribute può contenere solo lettere e numeri.',
    'array'                => 'Il campo :attribute deve essere un array.',
    'before'               => 'Il campo :attribute deve essere una data precedente a :date.',
    'before_or_equal'      => 'Il campo :attribute deve essere una data precedente o uguale a :date.',
    'between'              => [
        'numeric' => 'Il campo :attribute deve essere tra :min e :max.',
        'file'    => 'Il file :attribute deve essere tra :min e :max kilobyte.',
        'string'  => 'Il campo :attribute deve contenere tra :min e :max caratteri.',
        'array'   => 'Il campo :attribute deve avere tra :min e :max elementi.',
    ],
    'boolean'              => 'Il campo :attribute deve essere vero o falso.',
    'confirmed'            => 'La conferma di :attribute non corrisponde.',
    'current_password'     => 'La password non è corretta.',
    'date'                 => 'Il campo :attribute non è una data valida.',
    'date_equals'          => 'Il campo :attribute deve essere una data uguale a :date.',
    'date_format'          => 'Il campo :attribute non corrisponde al formato :format.',
    'different'            => 'I campi :attribute e :other devono essere diversi.',
    'digits'               => 'Il campo :attribute deve essere di :digits cifre.',
    'digits_between'       => 'Il campo :attribute deve essere tra :min e :max cifre.',
    'dimensions'           => 'Le dimensioni dell\'immagine :attribute non sono valide.',
    'distinct'             => 'Il campo :attribute ha un valore duplicato.',
    'email'                => 'Il campo :attribute deve essere un indirizzo email valido.',
    'ends_with'            => 'Il campo :attribute deve terminare con uno dei seguenti valori: :values.',
    'exists'               => 'Il valore selezionato per :attribute non è valido.',
    'file'                 => 'Il campo :attribute deve essere un file.',
    'filled'               => 'Il campo :attribute deve avere un valore.',
    'gt'                   => [
        'numeric' => 'Il campo :attribute deve essere maggiore di :value.',
        'file'    => 'Il file :attribute deve essere maggiore di :value kilobyte.',
        'string'  => 'Il campo :attribute deve contenere più di :value caratteri.',
        'array'   => 'Il campo :attribute deve avere più di :value elementi.',
    ],
    'gte'                  => [
        'numeric' => 'Il campo :attribute deve essere maggiore o uguale a :value.',
        'file'    => 'Il file :attribute deve essere maggiore o uguale a :value kilobyte.',
        'string'  => 'Il campo :attribute deve contenere almeno :value caratteri.',
        'array'   => 'Il campo :attribute deve avere almeno :value elementi.',
    ],
    'image'                => 'Il campo :attribute deve essere un\'immagine.',
    'in'                   => 'Il valore selezionato per :attribute non è valido.',
    'in_array'             => 'Il campo :attribute non esiste in :other.',
    'integer'              => 'Il campo :attribute deve essere un numero intero.',
    'ip'                   => 'Il campo :attribute deve essere un indirizzo IP valido.',
    'ipv4'                 => 'Il campo :attribute deve essere un indirizzo IPv4 valido.',
    'ipv6'                 => 'Il campo :attribute deve essere un indirizzo IPv6 valido.',
    'json'                 => 'Il campo :attribute deve essere una stringa JSON valida.',
    'lt'                   => [
        'numeric' => 'Il campo :attribute deve essere minore di :value.',
        'file'    => 'Il file :attribute deve essere minore di :value kilobyte.',
        'string'  => 'Il campo :attribute deve contenere meno di :value caratteri.',
        'array'   => 'Il campo :attribute deve avere meno di :value elementi.',
    ],
    'lte'                  => [
        'numeric' => 'Il campo :attribute deve essere minore o uguale a :value.',
        'file'    => 'Il file :attribute deve essere minore o uguale a :value kilobyte.',
        'string'  => 'Il campo :attribute non può contenere più di :value caratteri.',
        'array'   => 'Il campo :attribute non deve avere più di :value elementi.',
    ],
    'max'                  => [
        'numeric' => 'Il campo :attribute non può essere superiore a :max.',
        'file'    => 'Il file :attribute non può essere più grande di :max kilobyte.',
        'string'  => 'Il campo :attribute non può contenere più di :max caratteri.',
        'array'   => 'Il campo :attribute non può avere più di :max elementi.',
    ],
    'mimes'                => 'Il campo :attribute deve essere un file di tipo: :values.',
    'mimetypes'            => 'Il campo :attribute deve essere un file di tipo: :values.',
    'min'                  => [
        'numeric' => 'Il campo :attribute deve essere almeno :min.',
        'file'    => 'Il file :attribute deve essere almeno di :min kilobyte.',
        'string'  => 'Il campo :attribute deve contenere almeno :min caratteri.',
        'array'   => 'Il campo :attribute deve avere almeno :min elementi.',
    ],
    'multiple_of'          => 'Il campo :attribute deve essere un multiplo di :value.',
    'not_in'               => 'Il valore selezionato per :attribute non è valido.',
    'not_regex'            => 'Il formato del campo :attribute non è valido.',
    'numeric'              => 'Il campo :attribute deve essere un numero.',
    'password'             => 'La password non è corretta.',
    'present'              => 'Il campo :attribute deve essere presente.',
    'regex'                => 'Il formato del campo :attribute non è valido.',
    'required'             => 'Il campo :attribute è obbligatorio.',
    'required_if'          => 'Il campo :attribute è obbligatorio quando :other è :value.',
    'required_unless'      => 'Il campo :attribute è obbligatorio salvo che :other sia in :values.',
    'required_with'        => 'Il campo :attribute è obbligatorio quando :values è presente.',
    'required_with_all'    => 'Il campo :attribute è obbligatorio quando sono presenti :values.',
    'required_without'     => 'Il campo :attribute è obbligatorio quando :values non è presente.',
    'required_without_all' => 'Il campo :attribute è obbligatorio quando nessuno di :values è presente.',
    'prohibited'           => 'Il campo :attribute è proibito.',
    'prohibited_if'        => 'Il campo :attribute è proibito quando :other è :value.',
    'prohibited_unless'    => 'Il campo :attribute è proibito salvo che :other sia in :values.',
    'same'                 => 'I campi :attribute e :other devono coincidere.',
    'size'                 => [
        'numeric' => 'Il campo :attribute deve essere :size.',
        'file'    => 'Il file :attribute deve essere di :size kilobyte.',
        'string'  => 'Il campo :attribute deve contenere :size caratteri.',
        'array'   => 'Il campo :attribute deve contenere :size elementi.',
    ],
    'starts_with'          => 'Il campo :attribute deve iniziare con uno dei seguenti valori: :values.',
    'string'               => 'Il campo :attribute deve essere una stringa.',
    'timezone'             => 'Il campo :attribute deve essere un fuso orario valido.',
    'unique'               => 'Il valore del campo :attribute è già stato utilizzato.',
    'uploaded'             => 'Il caricamento del campo :attribute non è riuscito.',
    'url'                  => 'Il campo :attribute deve essere un URL valido.',
    'uuid'                 => 'Il campo :attribute deve essere un UUID valido.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Qui puoi specificare messaggi personalizzati per attributi specifici.
    |
    */

    'custom' => [
        'email' => [
            'unique' => 'Questa email è già registrata. Prova ad accedere.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | Qui puoi specificare un nome leggibile per gli attributi al posto
    | del loro "nome tecnico".
    |
    */

    'attributes' => [],

];
