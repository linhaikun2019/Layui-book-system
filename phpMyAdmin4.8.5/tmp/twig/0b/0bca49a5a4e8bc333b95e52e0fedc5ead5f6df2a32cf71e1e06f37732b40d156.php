<?php

/* columns_definitions/transformation.twig */
class __TwigTemplate_6f32125199f23ff7ea936a9940c68d8eda08b0b9a0eef6e79e8ab94939da4e23 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 1
        echo "<select id=\"field_";
        echo twig_escape_filter($this->env, ($context["column_number"] ?? null), "html", null, true);
        echo "_";
        echo twig_escape_filter($this->env, (($context["ci"] ?? null) - ($context["ci_offset"] ?? null)), "html", null, true);
        echo "\"
    size=\"1\"
    name=\"field_";
        // line 3
        echo twig_escape_filter($this->env, ($context["type"] ?? null), "html", null, true);
        echo "[";
        echo twig_escape_filter($this->env, ($context["column_number"] ?? null), "html", null, true);
        echo "]\">
    <option value=\"\" title=\"";
        // line 4
        echo _gettext("None");
        echo "\"></option>
    ";
        // line 5
        if (($this->getAttribute(($context["available_mime"] ?? null), ($context["type"] ?? null), [], "array", true, true) && twig_test_iterable($this->getAttribute(($context["available_mime"] ?? null), ($context["type"] ?? null), [], "array")))) {
            // line 6
            echo "        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["available_mime"] ?? null), ($context["type"] ?? null), [], "array"));
            foreach ($context['_seq'] as $context["mimekey"] => $context["transform"]) {
                // line 7
                echo "            ";
                $context["checked"] = (((($this->getAttribute(($context["column_meta"] ?? null), "Field", [], "array", true, true) && $this->getAttribute($this->getAttribute(                // line 8
($context["mime_map"] ?? null), $this->getAttribute(($context["column_meta"] ?? null), "Field", [], "array"), [], "array", false, true), ($context["type"] ?? null), [], "array", true, true)) && preg_match((("@" . preg_quote($this->getAttribute($this->getAttribute(                // line 10
($context["available_mime"] ?? null), (($context["type"] ?? null) . "_file"), [], "array"), $context["mimekey"], [], "array"), "@")) . "3?@i"), $this->getAttribute($this->getAttribute(                // line 9
($context["mime_map"] ?? null), $this->getAttribute(($context["column_meta"] ?? null), "Field", [], "array"), [], "array"), ($context["type"] ?? null), [], "array")))) ? ("selected ") : (""));
                // line 12
                echo "            ";
                $context["tooltip"] = PhpMyAdmin\Transformations::getDescription($this->getAttribute($this->getAttribute(                // line 13
($context["available_mime"] ?? null), (($context["type"] ?? null) . "_file"), [], "array"), $context["mimekey"], [], "array"));
                // line 15
                echo "            ";
                $context["parts"] = twig_split_filter($this->env, $context["transform"], ":");
                // line 16
                echo "            ";
                $context["name"] = (((((PhpMyAdmin\Transformations::getName($this->getAttribute($this->getAttribute(                // line 17
($context["available_mime"] ?? null), (($context["type"] ?? null) . "_file"), [], "array"), $context["mimekey"], [], "array")) . " (") . twig_lower_filter($this->env, $this->getAttribute(                // line 18
($context["parts"] ?? null), 0, [], "array"))) . ":") . $this->getAttribute(($context["parts"] ?? null), 1, [], "array")) . ")");
                // line 19
                echo "            <option value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["available_mime"] ?? null), (($context["type"] ?? null) . "_file"), [], "array"), $context["mimekey"], [], "array"), "html", null, true);
                echo "\"
                ";
                // line 20
                echo twig_escape_filter($this->env, ($context["checked"] ?? null), "html", null, true);
                echo "
                title=\"";
                // line 21
                echo twig_escape_filter($this->env, ($context["tooltip"] ?? null), "html", null, true);
                echo "\">
                ";
                // line 22
                echo twig_escape_filter($this->env, ($context["name"] ?? null), "html", null, true);
                echo "
            </option>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['mimekey'], $context['transform'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 25
            echo "    ";
        }
        // line 26
        echo "</select>
";
    }

    public function getTemplateName()
    {
        return "columns_definitions/transformation.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  87 => 26,  84 => 25,  75 => 22,  71 => 21,  67 => 20,  62 => 19,  60 => 18,  59 => 17,  57 => 16,  54 => 15,  52 => 13,  50 => 12,  48 => 9,  47 => 10,  46 => 8,  44 => 7,  39 => 6,  37 => 5,  33 => 4,  27 => 3,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "columns_definitions/transformation.twig", "D:\\phpstudy_pro\\WWW\\phpMyAdmin4.8.5\\templates\\columns_definitions\\transformation.twig");
    }
}
