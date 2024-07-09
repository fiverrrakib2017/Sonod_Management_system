import { Plugin } from 'grapesjs';

export type PluginOptions = {
	/**
	 * Inecessary plugin options
	 * @default 'api'
	 * @default 'API'
	 * @default ''
	 * @default ''
	 * @default 'api'
	 */
	id?: string[];
	label?: string[];
	style?: string;
	block?: (blockId: string) => {};
	styleAdditional?: string;
	classPrefix?: string;
	blocks?: string[];
	inlineCss?: boolean;
	updateStyleManager?: boolean;
	tableStyle?: Record<string, string>;
	cellStyle?: Record<string, string>;
};
export type RequiredPluginOptions = Required<PluginOptions>;
declare const plugin: Plugin<PluginOptions>;

export {
	plugin as default,
};

export {};
