
window.projectVersion = 'master';

(function(root) {

    var bhIndex = null;
    var rootPath = '';
    var treeHtml = '        <ul>                <li data-name="namespace:Karomap" class="opened">                    <div style="padding-left:0px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="Karomap.html">Karomap</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="namespace:Karomap_PHPOGC" class="opened">                    <div style="padding-left:18px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="Karomap/PHPOGC.html">PHPOGC</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="namespace:Karomap_PHPOGC_DataTypes" >                    <div style="padding-left:36px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="Karomap/PHPOGC/DataTypes.html">DataTypes</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:Karomap_PHPOGC_DataTypes_GeometryCollection" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Karomap/PHPOGC/DataTypes/GeometryCollection.html">GeometryCollection</a>                    </div>                </li>                            <li data-name="class:Karomap_PHPOGC_DataTypes_LineString" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Karomap/PHPOGC/DataTypes/LineString.html">LineString</a>                    </div>                </li>                            <li data-name="class:Karomap_PHPOGC_DataTypes_MultiLineString" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Karomap/PHPOGC/DataTypes/MultiLineString.html">MultiLineString</a>                    </div>                </li>                            <li data-name="class:Karomap_PHPOGC_DataTypes_MultiPoint" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Karomap/PHPOGC/DataTypes/MultiPoint.html">MultiPoint</a>                    </div>                </li>                            <li data-name="class:Karomap_PHPOGC_DataTypes_MultiPolygon" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Karomap/PHPOGC/DataTypes/MultiPolygon.html">MultiPolygon</a>                    </div>                </li>                            <li data-name="class:Karomap_PHPOGC_DataTypes_Point" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Karomap/PHPOGC/DataTypes/Point.html">Point</a>                    </div>                </li>                            <li data-name="class:Karomap_PHPOGC_DataTypes_Polygon" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Karomap/PHPOGC/DataTypes/Polygon.html">Polygon</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="namespace:Karomap_PHPOGC_Exceptions" >                    <div style="padding-left:36px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="Karomap/PHPOGC/Exceptions.html">Exceptions</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:Karomap_PHPOGC_Exceptions_GeoSpatialException" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="Karomap/PHPOGC/Exceptions/GeoSpatialException.html">GeoSpatialException</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="class:Karomap_PHPOGC_OGCObject" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="Karomap/PHPOGC/OGCObject.html">OGCObject</a>                    </div>                </li>                </ul></div>                </li>                </ul></div>                </li>                </ul>';

    var searchTypeClasses = {
        'Namespace': 'label-default',
        'Class': 'label-info',
        'Interface': 'label-primary',
        'Trait': 'label-success',
        'Method': 'label-danger',
        '_': 'label-warning'
    };

    var searchIndex = [
                    
            {"type": "Namespace", "link": "Karomap.html", "name": "Karomap", "doc": "Namespace Karomap"},{"type": "Namespace", "link": "Karomap/PHPOGC.html", "name": "Karomap\\PHPOGC", "doc": "Namespace Karomap\\PHPOGC"},{"type": "Namespace", "link": "Karomap/PHPOGC/DataTypes.html", "name": "Karomap\\PHPOGC\\DataTypes", "doc": "Namespace Karomap\\PHPOGC\\DataTypes"},{"type": "Namespace", "link": "Karomap/PHPOGC/Exceptions.html", "name": "Karomap\\PHPOGC\\Exceptions", "doc": "Namespace Karomap\\PHPOGC\\Exceptions"},
            
            {"type": "Class", "fromName": "Karomap\\PHPOGC\\DataTypes", "fromLink": "Karomap/PHPOGC/DataTypes.html", "link": "Karomap/PHPOGC/DataTypes/GeometryCollection.html", "name": "Karomap\\PHPOGC\\DataTypes\\GeometryCollection", "doc": "&quot;OGC GeometryCollection type.&quot;"},
                                                        {"type": "Method", "fromName": "Karomap\\PHPOGC\\DataTypes\\GeometryCollection", "fromLink": "Karomap/PHPOGC/DataTypes/GeometryCollection.html", "link": "Karomap/PHPOGC/DataTypes/GeometryCollection.html#method___construct", "name": "Karomap\\PHPOGC\\DataTypes\\GeometryCollection::__construct", "doc": "&quot;GeometryCollection constructor.&quot;"},
                    {"type": "Method", "fromName": "Karomap\\PHPOGC\\DataTypes\\GeometryCollection", "fromLink": "Karomap/PHPOGC/DataTypes/GeometryCollection.html", "link": "Karomap/PHPOGC/DataTypes/GeometryCollection.html#method_toValueArray", "name": "Karomap\\PHPOGC\\DataTypes\\GeometryCollection::toValueArray", "doc": "&quot;Array representation of instance coordinates.&quot;"},
                    {"type": "Method", "fromName": "Karomap\\PHPOGC\\DataTypes\\GeometryCollection", "fromLink": "Karomap/PHPOGC/DataTypes/GeometryCollection.html", "link": "Karomap/PHPOGC/DataTypes/GeometryCollection.html#method___toString", "name": "Karomap\\PHPOGC\\DataTypes\\GeometryCollection::__toString", "doc": "&quot;String representation of the instance.&quot;"},
                    {"type": "Method", "fromName": "Karomap\\PHPOGC\\DataTypes\\GeometryCollection", "fromLink": "Karomap/PHPOGC/DataTypes/GeometryCollection.html", "link": "Karomap/PHPOGC/DataTypes/GeometryCollection.html#method_count", "name": "Karomap\\PHPOGC\\DataTypes\\GeometryCollection::count", "doc": "&quot;Countable interface implementation.&quot;"},
            
            {"type": "Class", "fromName": "Karomap\\PHPOGC\\DataTypes", "fromLink": "Karomap/PHPOGC/DataTypes.html", "link": "Karomap/PHPOGC/DataTypes/LineString.html", "name": "Karomap\\PHPOGC\\DataTypes\\LineString", "doc": "&quot;OGC LineString type.&quot;"},
                                                        {"type": "Method", "fromName": "Karomap\\PHPOGC\\DataTypes\\LineString", "fromLink": "Karomap/PHPOGC/DataTypes/LineString.html", "link": "Karomap/PHPOGC/DataTypes/LineString.html#method___construct", "name": "Karomap\\PHPOGC\\DataTypes\\LineString::__construct", "doc": "&quot;LineString constructor.&quot;"},
                    {"type": "Method", "fromName": "Karomap\\PHPOGC\\DataTypes\\LineString", "fromLink": "Karomap/PHPOGC/DataTypes/LineString.html", "link": "Karomap/PHPOGC/DataTypes/LineString.html#method_fromArray", "name": "Karomap\\PHPOGC\\DataTypes\\LineString::fromArray", "doc": "&quot;A Linestring could be constructed with an array of points-array.&quot;"},
                    {"type": "Method", "fromName": "Karomap\\PHPOGC\\DataTypes\\LineString", "fromLink": "Karomap/PHPOGC/DataTypes/LineString.html", "link": "Karomap/PHPOGC/DataTypes/LineString.html#method_fromString", "name": "Karomap\\PHPOGC\\DataTypes\\LineString::fromString", "doc": "&quot;A Linestring could be instantiated using a string where points are divided by a \&quot;,\&quot; and coordinates\nare divided by \&quot; \&quot;. Separators must be different.&quot;"},
                    {"type": "Method", "fromName": "Karomap\\PHPOGC\\DataTypes\\LineString", "fromLink": "Karomap/PHPOGC/DataTypes/LineString.html", "link": "Karomap/PHPOGC/DataTypes/LineString.html#method_toValueArray", "name": "Karomap\\PHPOGC\\DataTypes\\LineString::toValueArray", "doc": "&quot;Array representation of instance coordinates.&quot;"},
                    {"type": "Method", "fromName": "Karomap\\PHPOGC\\DataTypes\\LineString", "fromLink": "Karomap/PHPOGC/DataTypes/LineString.html", "link": "Karomap/PHPOGC/DataTypes/LineString.html#method___toString", "name": "Karomap\\PHPOGC\\DataTypes\\LineString::__toString", "doc": "&quot;String representation of the instance.&quot;"},
                    {"type": "Method", "fromName": "Karomap\\PHPOGC\\DataTypes\\LineString", "fromLink": "Karomap/PHPOGC/DataTypes/LineString.html", "link": "Karomap/PHPOGC/DataTypes/LineString.html#method_isCircular", "name": "Karomap\\PHPOGC\\DataTypes\\LineString::isCircular", "doc": "&quot;Check if the LineString is circular, that is the first and the last Point are the same.&quot;"},
                    {"type": "Method", "fromName": "Karomap\\PHPOGC\\DataTypes\\LineString", "fromLink": "Karomap/PHPOGC/DataTypes/LineString.html", "link": "Karomap/PHPOGC/DataTypes/LineString.html#method_lenght", "name": "Karomap\\PHPOGC\\DataTypes\\LineString::lenght", "doc": "&quot;Return the lenght of the linestring expressed in meters.&quot;"},
                    {"type": "Method", "fromName": "Karomap\\PHPOGC\\DataTypes\\LineString", "fromLink": "Karomap/PHPOGC/DataTypes/LineString.html", "link": "Karomap/PHPOGC/DataTypes/LineString.html#method_insertPoint", "name": "Karomap\\PHPOGC\\DataTypes\\LineString::insertPoint", "doc": "&quot;Insert a Point into the LineString.&quot;"},
                    {"type": "Method", "fromName": "Karomap\\PHPOGC\\DataTypes\\LineString", "fromLink": "Karomap/PHPOGC/DataTypes/LineString.html", "link": "Karomap/PHPOGC/DataTypes/LineString.html#method_split", "name": "Karomap\\PHPOGC\\DataTypes\\LineString::split", "doc": "&quot;Split the LineString object on the given Point, if present, and returns a tuple (array with two object) composed\nby Points, LineStrings or null.&quot;"},
                    {"type": "Method", "fromName": "Karomap\\PHPOGC\\DataTypes\\LineString", "fromLink": "Karomap/PHPOGC/DataTypes/LineString.html", "link": "Karomap/PHPOGC/DataTypes/LineString.html#method_diff", "name": "Karomap\\PHPOGC\\DataTypes\\LineString::diff", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Karomap\\PHPOGC\\DataTypes\\LineString", "fromLink": "Karomap/PHPOGC/DataTypes/LineString.html", "link": "Karomap/PHPOGC/DataTypes/LineString.html#method_count", "name": "Karomap\\PHPOGC\\DataTypes\\LineString::count", "doc": "&quot;Countable interface implementation.&quot;"},
            
            {"type": "Class", "fromName": "Karomap\\PHPOGC\\DataTypes", "fromLink": "Karomap/PHPOGC/DataTypes.html", "link": "Karomap/PHPOGC/DataTypes/MultiLineString.html", "name": "Karomap\\PHPOGC\\DataTypes\\MultiLineString", "doc": "&quot;OGC MultiLineString type.&quot;"},
                                                        {"type": "Method", "fromName": "Karomap\\PHPOGC\\DataTypes\\MultiLineString", "fromLink": "Karomap/PHPOGC/DataTypes/MultiLineString.html", "link": "Karomap/PHPOGC/DataTypes/MultiLineString.html#method___construct", "name": "Karomap\\PHPOGC\\DataTypes\\MultiLineString::__construct", "doc": "&quot;MultiLineString constructor.&quot;"},
            
            {"type": "Class", "fromName": "Karomap\\PHPOGC\\DataTypes", "fromLink": "Karomap/PHPOGC/DataTypes.html", "link": "Karomap/PHPOGC/DataTypes/MultiPoint.html", "name": "Karomap\\PHPOGC\\DataTypes\\MultiPoint", "doc": "&quot;OGC MultiPoint type.&quot;"},
                                                        {"type": "Method", "fromName": "Karomap\\PHPOGC\\DataTypes\\MultiPoint", "fromLink": "Karomap/PHPOGC/DataTypes/MultiPoint.html", "link": "Karomap/PHPOGC/DataTypes/MultiPoint.html#method___construct", "name": "Karomap\\PHPOGC\\DataTypes\\MultiPoint::__construct", "doc": "&quot;MultiPoint constructor.&quot;"},
            
            {"type": "Class", "fromName": "Karomap\\PHPOGC\\DataTypes", "fromLink": "Karomap/PHPOGC/DataTypes.html", "link": "Karomap/PHPOGC/DataTypes/MultiPolygon.html", "name": "Karomap\\PHPOGC\\DataTypes\\MultiPolygon", "doc": "&quot;OGC MultiPolygon type.&quot;"},
                                                        {"type": "Method", "fromName": "Karomap\\PHPOGC\\DataTypes\\MultiPolygon", "fromLink": "Karomap/PHPOGC/DataTypes/MultiPolygon.html", "link": "Karomap/PHPOGC/DataTypes/MultiPolygon.html#method___construct", "name": "Karomap\\PHPOGC\\DataTypes\\MultiPolygon::__construct", "doc": "&quot;MultiPolygon constructor.&quot;"},
                    {"type": "Method", "fromName": "Karomap\\PHPOGC\\DataTypes\\MultiPolygon", "fromLink": "Karomap/PHPOGC/DataTypes/MultiPolygon.html", "link": "Karomap/PHPOGC/DataTypes/MultiPolygon.html#method_fromArray", "name": "Karomap\\PHPOGC\\DataTypes\\MultiPolygon::fromArray", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Karomap\\PHPOGC\\DataTypes\\MultiPolygon", "fromLink": "Karomap/PHPOGC/DataTypes/MultiPolygon.html", "link": "Karomap/PHPOGC/DataTypes/MultiPolygon.html#method_fromString", "name": "Karomap\\PHPOGC\\DataTypes\\MultiPolygon::fromString", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Karomap\\PHPOGC\\DataTypes\\MultiPolygon", "fromLink": "Karomap/PHPOGC/DataTypes/MultiPolygon.html", "link": "Karomap/PHPOGC/DataTypes/MultiPolygon.html#method_toValueArray", "name": "Karomap\\PHPOGC\\DataTypes\\MultiPolygon::toValueArray", "doc": "&quot;Array representation of instance coordinates.&quot;"},
                    {"type": "Method", "fromName": "Karomap\\PHPOGC\\DataTypes\\MultiPolygon", "fromLink": "Karomap/PHPOGC/DataTypes/MultiPolygon.html", "link": "Karomap/PHPOGC/DataTypes/MultiPolygon.html#method___toString", "name": "Karomap\\PHPOGC\\DataTypes\\MultiPolygon::__toString", "doc": "&quot;String representation of the instance.&quot;"},
                    {"type": "Method", "fromName": "Karomap\\PHPOGC\\DataTypes\\MultiPolygon", "fromLink": "Karomap/PHPOGC/DataTypes/MultiPolygon.html", "link": "Karomap/PHPOGC/DataTypes/MultiPolygon.html#method_count", "name": "Karomap\\PHPOGC\\DataTypes\\MultiPolygon::count", "doc": "&quot;Countable interface implementation.&quot;"},
            
            {"type": "Class", "fromName": "Karomap\\PHPOGC\\DataTypes", "fromLink": "Karomap/PHPOGC/DataTypes.html", "link": "Karomap/PHPOGC/DataTypes/Point.html", "name": "Karomap\\PHPOGC\\DataTypes\\Point", "doc": "&quot;OGC Point type.&quot;"},
                                                        {"type": "Method", "fromName": "Karomap\\PHPOGC\\DataTypes\\Point", "fromLink": "Karomap/PHPOGC/DataTypes/Point.html", "link": "Karomap/PHPOGC/DataTypes/Point.html#method___construct", "name": "Karomap\\PHPOGC\\DataTypes\\Point::__construct", "doc": "&quot;Point constructor.&quot;"},
                    {"type": "Method", "fromName": "Karomap\\PHPOGC\\DataTypes\\Point", "fromLink": "Karomap/PHPOGC/DataTypes/Point.html", "link": "Karomap/PHPOGC/DataTypes/Point.html#method_fromArray", "name": "Karomap\\PHPOGC\\DataTypes\\Point::fromArray", "doc": "&quot;A Point could be instantiated from array containing a tuple of string|float lat, lon\n     $point = Point::fromArray([\&quot;1.123\&quot;, \&quot;2.345\&quot;])\n     $point = Point::fromArray([1.123, 2.345]).&quot;"},
                    {"type": "Method", "fromName": "Karomap\\PHPOGC\\DataTypes\\Point", "fromLink": "Karomap/PHPOGC/DataTypes/Point.html", "link": "Karomap/PHPOGC/DataTypes/Point.html#method_fromString", "name": "Karomap\\PHPOGC\\DataTypes\\Point::fromString", "doc": "&quot;A Point could be instantiated from a string with a delimiters, by default \&quot; \&quot; is used\n     $point = Point::fromString(\&quot;1.123 2.345\&quot;)\n     $point = Point::fromString(\&quot;1.123: 2.345\&quot;, \&quot;:\&quot;).&quot;"},
                    {"type": "Method", "fromName": "Karomap\\PHPOGC\\DataTypes\\Point", "fromLink": "Karomap/PHPOGC/DataTypes/Point.html", "link": "Karomap/PHPOGC/DataTypes/Point.html#method_toValueArray", "name": "Karomap\\PHPOGC\\DataTypes\\Point::toValueArray", "doc": "&quot;Array representation of instance coordinates.&quot;"},
                    {"type": "Method", "fromName": "Karomap\\PHPOGC\\DataTypes\\Point", "fromLink": "Karomap/PHPOGC/DataTypes/Point.html", "link": "Karomap/PHPOGC/DataTypes/Point.html#method___toString", "name": "Karomap\\PHPOGC\\DataTypes\\Point::__toString", "doc": "&quot;String representation of the instance.&quot;"},
                    {"type": "Method", "fromName": "Karomap\\PHPOGC\\DataTypes\\Point", "fromLink": "Karomap/PHPOGC/DataTypes/Point.html", "link": "Karomap/PHPOGC/DataTypes/Point.html#method_distance", "name": "Karomap\\PHPOGC\\DataTypes\\Point::distance", "doc": "&quot;Calculate the distance between two points in meter.&quot;"},
                    {"type": "Method", "fromName": "Karomap\\PHPOGC\\DataTypes\\Point", "fromLink": "Karomap/PHPOGC/DataTypes/Point.html", "link": "Karomap/PHPOGC/DataTypes/Point.html#method___get", "name": "Karomap\\PHPOGC\\DataTypes\\Point::__get", "doc": "&quot;Get an object property.&quot;"},
            
            {"type": "Class", "fromName": "Karomap\\PHPOGC\\DataTypes", "fromLink": "Karomap/PHPOGC/DataTypes.html", "link": "Karomap/PHPOGC/DataTypes/Polygon.html", "name": "Karomap\\PHPOGC\\DataTypes\\Polygon", "doc": "&quot;OGC Polygon type.&quot;"},
                                                        {"type": "Method", "fromName": "Karomap\\PHPOGC\\DataTypes\\Polygon", "fromLink": "Karomap/PHPOGC/DataTypes/Polygon.html", "link": "Karomap/PHPOGC/DataTypes/Polygon.html#method___construct", "name": "Karomap\\PHPOGC\\DataTypes\\Polygon::__construct", "doc": "&quot;Polygon constructor. A Polygon must be constructed with at least 1 closed linestring.&quot;"},
                    {"type": "Method", "fromName": "Karomap\\PHPOGC\\DataTypes\\Polygon", "fromLink": "Karomap/PHPOGC/DataTypes/Polygon.html", "link": "Karomap/PHPOGC/DataTypes/Polygon.html#method_fromArray", "name": "Karomap\\PHPOGC\\DataTypes\\Polygon::fromArray", "doc": "&quot;A Polygon could be instantiated with an array like this:.&quot;"},
                    {"type": "Method", "fromName": "Karomap\\PHPOGC\\DataTypes\\Polygon", "fromLink": "Karomap/PHPOGC/DataTypes/Polygon.html", "link": "Karomap/PHPOGC/DataTypes/Polygon.html#method_fromString", "name": "Karomap\\PHPOGC\\DataTypes\\Polygon::fromString", "doc": "&quot;A Polygon could be instantiated using a string containing linestrings.&quot;"},
                    {"type": "Method", "fromName": "Karomap\\PHPOGC\\DataTypes\\Polygon", "fromLink": "Karomap/PHPOGC/DataTypes/Polygon.html", "link": "Karomap/PHPOGC/DataTypes/Polygon.html#method_toValueArray", "name": "Karomap\\PHPOGC\\DataTypes\\Polygon::toValueArray", "doc": "&quot;Array representation of instance coordinates.&quot;"},
                    {"type": "Method", "fromName": "Karomap\\PHPOGC\\DataTypes\\Polygon", "fromLink": "Karomap/PHPOGC/DataTypes/Polygon.html", "link": "Karomap/PHPOGC/DataTypes/Polygon.html#method___toString", "name": "Karomap\\PHPOGC\\DataTypes\\Polygon::__toString", "doc": "&quot;String representation of the instance.&quot;"},
                    {"type": "Method", "fromName": "Karomap\\PHPOGC\\DataTypes\\Polygon", "fromLink": "Karomap/PHPOGC/DataTypes/Polygon.html", "link": "Karomap/PHPOGC/DataTypes/Polygon.html#method_count", "name": "Karomap\\PHPOGC\\DataTypes\\Polygon::count", "doc": "&quot;Countable interface implementation.&quot;"},
            
            {"type": "Class", "fromName": "Karomap\\PHPOGC\\Exceptions", "fromLink": "Karomap/PHPOGC/Exceptions.html", "link": "Karomap/PHPOGC/Exceptions/GeoSpatialException.html", "name": "Karomap\\PHPOGC\\Exceptions\\GeoSpatialException", "doc": "&quot;&quot;"},
                    
            {"type": "Class", "fromName": "Karomap\\PHPOGC", "fromLink": "Karomap/PHPOGC.html", "link": "Karomap/PHPOGC/OGCObject.html", "name": "Karomap\\PHPOGC\\OGCObject", "doc": "&quot;Abstract class represent Open Geospatial Consortium (OGC) geometry type.&quot;"},
                                                        {"type": "Method", "fromName": "Karomap\\PHPOGC\\OGCObject", "fromLink": "Karomap/PHPOGC/OGCObject.html", "link": "Karomap/PHPOGC/OGCObject.html#method___get", "name": "Karomap\\PHPOGC\\OGCObject::__get", "doc": "&quot;Get an object property.&quot;"},
                    {"type": "Method", "fromName": "Karomap\\PHPOGC\\OGCObject", "fromLink": "Karomap/PHPOGC/OGCObject.html", "link": "Karomap/PHPOGC/OGCObject.html#method_buildOGCObject", "name": "Karomap\\PHPOGC\\OGCObject::buildOGCObject", "doc": "&quot;Create an OGCObject instance from parsed WKB\/WKT.&quot;"},
                    {"type": "Method", "fromName": "Karomap\\PHPOGC\\OGCObject", "fromLink": "Karomap/PHPOGC/OGCObject.html", "link": "Karomap/PHPOGC/OGCObject.html#method_fromWKT", "name": "Karomap\\PHPOGC\\OGCObject::fromWKT", "doc": "&quot;Create an OGCObject instance from WKT.&quot;"},
                    {"type": "Method", "fromName": "Karomap\\PHPOGC\\OGCObject", "fromLink": "Karomap/PHPOGC/OGCObject.html", "link": "Karomap/PHPOGC/OGCObject.html#method_fromWKB", "name": "Karomap\\PHPOGC\\OGCObject::fromWKB", "doc": "&quot;Create an OGCObject instance from WKB.&quot;"},
                    {"type": "Method", "fromName": "Karomap\\PHPOGC\\OGCObject", "fromLink": "Karomap/PHPOGC/OGCObject.html", "link": "Karomap/PHPOGC/OGCObject.html#method_toWKT", "name": "Karomap\\PHPOGC\\OGCObject::toWKT", "doc": "&quot;Get WKT representation of the instance.&quot;"},
                    {"type": "Method", "fromName": "Karomap\\PHPOGC\\OGCObject", "fromLink": "Karomap/PHPOGC/OGCObject.html", "link": "Karomap/PHPOGC/OGCObject.html#method_toWKB", "name": "Karomap\\PHPOGC\\OGCObject::toWKB", "doc": "&quot;(not implemented)\nGet WKB representation of the instance.&quot;"},
                    {"type": "Method", "fromName": "Karomap\\PHPOGC\\OGCObject", "fromLink": "Karomap/PHPOGC/OGCObject.html", "link": "Karomap/PHPOGC/OGCObject.html#method_toValueArray", "name": "Karomap\\PHPOGC\\OGCObject::toValueArray", "doc": "&quot;Array representation of instance coordinates.&quot;"},
                    {"type": "Method", "fromName": "Karomap\\PHPOGC\\OGCObject", "fromLink": "Karomap/PHPOGC/OGCObject.html", "link": "Karomap/PHPOGC/OGCObject.html#method_toArray", "name": "Karomap\\PHPOGC\\OGCObject::toArray", "doc": "&quot;Array representation of the instance.&quot;"},
                    {"type": "Method", "fromName": "Karomap\\PHPOGC\\OGCObject", "fromLink": "Karomap/PHPOGC/OGCObject.html", "link": "Karomap/PHPOGC/OGCObject.html#method___toString", "name": "Karomap\\PHPOGC\\OGCObject::__toString", "doc": "&quot;String representation of the instance.&quot;"},
            
            
                                        // Fix trailing commas in the index
        {}
    ];

    /** Tokenizes strings by namespaces and functions */
    function tokenizer(term) {
        if (!term) {
            return [];
        }

        var tokens = [term];
        var meth = term.indexOf('::');

        // Split tokens into methods if "::" is found.
        if (meth > -1) {
            tokens.push(term.substr(meth + 2));
            term = term.substr(0, meth - 2);
        }

        // Split by namespace or fake namespace.
        if (term.indexOf('\\') > -1) {
            tokens = tokens.concat(term.split('\\'));
        } else if (term.indexOf('_') > 0) {
            tokens = tokens.concat(term.split('_'));
        }

        // Merge in splitting the string by case and return
        tokens = tokens.concat(term.match(/(([A-Z]?[^A-Z]*)|([a-z]?[^a-z]*))/g).slice(0,-1));

        return tokens;
    };

    root.Sami = {
        /**
         * Cleans the provided term. If no term is provided, then one is
         * grabbed from the query string "search" parameter.
         */
        cleanSearchTerm: function(term) {
            // Grab from the query string
            if (typeof term === 'undefined') {
                var name = 'search';
                var regex = new RegExp("[\\?&]" + name + "=([^&#]*)");
                var results = regex.exec(location.search);
                if (results === null) {
                    return null;
                }
                term = decodeURIComponent(results[1].replace(/\+/g, " "));
            }

            return term.replace(/<(?:.|\n)*?>/gm, '');
        },

        /** Searches through the index for a given term */
        search: function(term) {
            // Create a new search index if needed
            if (!bhIndex) {
                bhIndex = new Bloodhound({
                    limit: 500,
                    local: searchIndex,
                    datumTokenizer: function (d) {
                        return tokenizer(d.name);
                    },
                    queryTokenizer: Bloodhound.tokenizers.whitespace
                });
                bhIndex.initialize();
            }

            results = [];
            bhIndex.get(term, function(matches) {
                results = matches;
            });

            if (!rootPath) {
                return results;
            }

            // Fix the element links based on the current page depth.
            return $.map(results, function(ele) {
                if (ele.link.indexOf('..') > -1) {
                    return ele;
                }
                ele.link = rootPath + ele.link;
                if (ele.fromLink) {
                    ele.fromLink = rootPath + ele.fromLink;
                }
                return ele;
            });
        },

        /** Get a search class for a specific type */
        getSearchClass: function(type) {
            return searchTypeClasses[type] || searchTypeClasses['_'];
        },

        /** Add the left-nav tree to the site */
        injectApiTree: function(ele) {
            ele.html(treeHtml);
        }
    };

    $(function() {
        // Modify the HTML to work correctly based on the current depth
        rootPath = $('body').attr('data-root-path');
        treeHtml = treeHtml.replace(/href="/g, 'href="' + rootPath);
        Sami.injectApiTree($('#api-tree'));
    });

    return root.Sami;
})(window);

$(function() {

    // Enable the version switcher
    $('#version-switcher').change(function() {
        window.location = $(this).val()
    });

    
        // Toggle left-nav divs on click
        $('#api-tree .hd span').click(function() {
            $(this).parent().parent().toggleClass('opened');
        });

        // Expand the parent namespaces of the current page.
        var expected = $('body').attr('data-name');

        if (expected) {
            // Open the currently selected node and its parents.
            var container = $('#api-tree');
            var node = $('#api-tree li[data-name="' + expected + '"]');
            // Node might not be found when simulating namespaces
            if (node.length > 0) {
                node.addClass('active').addClass('opened');
                node.parents('li').addClass('opened');
                var scrollPos = node.offset().top - container.offset().top + container.scrollTop();
                // Position the item nearer to the top of the screen.
                scrollPos -= 200;
                container.scrollTop(scrollPos);
            }
        }

    
    
        var form = $('#search-form .typeahead');
        form.typeahead({
            hint: true,
            highlight: true,
            minLength: 1
        }, {
            name: 'search',
            displayKey: 'name',
            source: function (q, cb) {
                cb(Sami.search(q));
            }
        });

        // The selection is direct-linked when the user selects a suggestion.
        form.on('typeahead:selected', function(e, suggestion) {
            window.location = suggestion.link;
        });

        // The form is submitted when the user hits enter.
        form.keypress(function (e) {
            if (e.which == 13) {
                $('#search-form').submit();
                return true;
            }
        });

    
});


