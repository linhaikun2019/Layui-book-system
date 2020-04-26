<?php

/* columns_definitions/transformation_option.twig */
class __TwigTemplate_54967b89729996de70cf8f5ea5e826929902b21066bb4c86142f312494f680da extends Twig_Template
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
        $context["options_key"] = (($context["type_prefix"] ?? null) . "transformation_options");
        // line 2
        echo "<input id=\"field_";
        echo twig_escape_filter($this->env, ($context["column_number"] ?? null), "html", null, true);
        echo "_";
        echo twig_escape_filter($this->env, (($context["ci"] ?? null) - ($context["ci_offset"] ?? null)), "html", null, true);
        echo "\"
    type=\"text\"
    name=\"field_";
        // line 4
        echo twig_escape_filter($this->env, ($context["options_key"] ?? null), "html", null, true);
        echo "[";
        echo twig_escape_filter($this->env, ($context["column_number"] ?? null), "html", null, true);
        echo "]\"
    size=\"16\"
    class=\"textfield\"
    value=\"";
        // line 7
        if (($this->getAttribute(($context["column_meta"] ?? null), "Field", [], "array", true, true) && $this->getAttribute($this->getAttribute(($context["mime_map"] ?? null), $this->getAttribute(($context["column_meta"] ?? null), "Field", [], "array"), [], "array", false, true), ($context["options_key"] ?? null), [], "array", true, true))) {
            // line 8
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["mime_map"] ?? null), $this->getAttribute(($context["column_meta"] ?? null), "Field", [], "array"), [], "array"), ($context["options_key"] ?? null), [], "array"), "html", null, true);
        }
        // line 9
        echo "\" />
";
    }

    public function getTemplateName()
    {
        return "columns_definitions/transformation_option.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  42 => 9,  39 => 8,  37 => 7,  29 => 4,  21 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "columns_definitions/transformation_option.twig", "D:\\phpstudy_pro\\WWW\\phpMyAdmin4.8.5\\templates\\columns_definitions\\transformation_option.twig");
    }
}
