<?php

# documentation
#   https://mymvc.ueffing.net/3.4.x/generating-datatype-classes#array_config
# creation
#   php emvicy.php datatype:module Email

#---------------------------------------------------------------
#  Defining DataType Classes

$sThisModuleDir = realpath(__DIR__ . '/../../../../');
$sThisModuleName = basename($sThisModuleDir);
$sThisModuleDataTypeDir = $sThisModuleDir . '/DataType';
$sThisModuleNamespace = str_replace('/', '\\', substr($sThisModuleDataTypeDir, strlen($aConfig['MVC_MODULES_DIR'] . '/')));

// base setup
$aDataType = array(

    // directory
    'dir' => $sThisModuleDataTypeDir,

    // remove complete dir before new creation
    'unlinkDir' => false,

    // enable creation of events in datatype methods
    'createEvents' => true,

    'class' => array(),
);

$aDataType['class']['DTEmail'] = array(
    'name' => 'DTEmail',
    'namespace' => $sThisModuleNamespace,
    'createHelperMethods' => true,
    'constant' => array(
    ),
    'property' => array(
        array('key' => 'subject', 'var' => 'string', 'required' => true, 'forceCasting' => true,),
        array('key' => 'recipientMailAdresses', 'var' => 'array', 'required' => true, 'forceCasting' => true,),
        array('key' => 'text', 'var' => 'string', 'required' => true, 'forceCasting' => true,),
        array('key' => 'html', 'var' => 'string', 'required' => false, 'forceCasting' => true,),
        array('key' => 'senderMail', 'var' => 'string', 'required' => true, 'forceCasting' => true,),
        array('key' => 'senderName', 'var' => 'string', 'required' => true, 'forceCasting' => true,),
        array(
            'key' => 'oAttachment',
            'var' => '\\MVC\\DataType\\DTArrayObject',
            'required' => false, 'forceCasting' => true,
        ),
    ),
);

$aDataType['class']['DTEmailAttachment'] = array(
    'name' => 'DTEmailAttachment',
    'namespace' => $sThisModuleNamespace,
    'createHelperMethods' => true,
    'constant' => array(
    ),
    'property' => array(
        array('key' => 'name', 'var' => 'string',),
        array('key' => 'file', 'var' => 'string',),
    ),
);

$aDataType['class']['DTEmailResponse'] = array(
    'name' => 'DTEmailResponse',
    'namespace' => $sThisModuleNamespace,
    'createHelperMethods' => true,
    'constant' => array(
    ),
    'property' => array(
        array('key' => 'bSuccess', 'var' => 'bool', 'value' => false, 'required' => true, 'forceCasting' => true,),
        array('key' => 'sMessage', 'var' => 'string', 'required' => false, 'forceCasting' => true,),
        array('key' => 'oException', 'var' => '\Exception', 'required' => false, 'forceCasting' => false,),
    ),
);

#---------------------------------------------------------------
# copy settings to module's config
# in your code you can access this datatype config by: \MVC\Config::MODULE()['DATATYPE'];

$aConfig['MODULE'][$sThisModuleName]['DATATYPE'] = $aDataType;